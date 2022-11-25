<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;

use App\Repositories\PostRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostImageRepository;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /** @var PostRepository */
    protected $postRepository;

    /** @var PostCategoryRepository */
    protected $postCategoryRepository;

     /** @var PostImageRepository */
     protected $postImageRepository;

    public function __construct(
        PostRepository $postRepository,
        PostCategoryRepository $postCategoryRepository,
        PostImageRepository $postImageRepository
    ) {
        $this->middleware('auth:admin');

        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postImageRepository =  $postImageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, null, 'postCategory');
         
            $total = $query->count();
            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            $postCategories = $this->postCategoryRepository->all();

            return view('admin.pages.posts.index', compact('items'))
                ->nest('filters', 'admin.pages.posts.filters', compact('params', 'total'))
                ->nest('table', 'admin.pages.posts.table', compact('items', 'postCategories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $postCategories = $this->postCategoryRepository->all();

            return view('admin.pages.posts.create', compact('postCategories'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $paramsRequest = $request->all();

            //dd($paramsRequest);

            /** Creating Post */
            $postParams = $request->except(['image']);


            $this->postRepository->create($postParams);

            /** Searching created Post */
            $post = $this->postRepository->getByAttribute('title', $request->title);

            /* dd($post); */  

            $files = $request->file('image');

            //  dd($files);

            $fileParams = array();
            if(!($request->file('image') == null)) {

                foreach($files as $key => $file){
                    //dd($key);
                     /** Saving Photo */
                 $fileParams[$key]  = $this->saveImageMultiple($file, $key);
                }
               
            }

           // dd($fileParams);

            if(!($request->file('image') == null)) {

                foreach($fileParams as $key => $fileParam){
                    $postImgParams['post_id'] = $post->id;
                    ($key == 0) ?  $postImgParams['is_header'] = 1 :   $postImgParams['is_header'] = 0;
                  
                    $postImg = array_merge($postImgParams,  $fileParam);

                    $this->postImageRepository->create($postImg);
                }
            }
           /*  else{
                $postImgParams['post_id'] = $post->id;
                $postImgParams['asset_url'] = 'https://media.tenor.com/3Yat5iUF8fgAAAAM/huh-quoi.gif';
                $postImgParams['asset'] = null;
                $postImgParams['is_header'] = 1;
                $this->postImageRepository->create($postImgParams);
            } */
           
        
            
            DB::commit();

            return redirect()->route('admin.posts.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $postCategories = $this->postCategoryRepository->all();


            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view('admin.pages.posts.edit', compact('item', 'postCategories', 'imageHeader', 'images'));

            //return redirect()->route('admin.posts,edit', compact('item', 'postCategories', 'imageHeader', 'images'))->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
        } catch (\Exception $th) {
            return redirect()->route('admin.posts.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
           // DB::beginTransaction();

            $params = $request->all();

            if(!($request->file('imagen') == null)) {
                $paramsImagen = $request->only(['imagen']);
            }
            

            // dd($request->file('imagen') == null);

             $post = $this->postRepository->getById($id);

             $this->postRepository->update($post, $request->all());

            if(!($request->file('imagen') == null)) {
                /** Saving Photo */
                $fileParams = $this->saveImage($paramsImagen['imagen']);
            }
                 //dd($fileParams);

            $postImage = $this->postImageRepository->getByAttribute("post_id" , $post->id);

            //dd( $postImage);

            if(!($request->file('imagen') == null)) {
                $postImgParams['post_id'] = $post->id;
                 $postImgParams['is_header'] = 1;
                  
                    $postImg = array_merge($postImgParams,  $fileParams);
                   // dd($postImg);
                    

                    $this->postImageRepository->update($postImage , $postImg);
            }

          //  DB::commit();

            return redirect()->route('admin.posts.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha actualizado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
           // dd($th);
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = $this->postRepository->getById($id);

            DB::beginTransaction();

            $this->postRepository->delete($post);

            DB::commit();

            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }
    }


    /**
     * @param StoreRequest $request
     * @param array $params
     */
    public function saveImage($file): array
    {
      //  $file = $request->file('image');

        $params = [];

        $fileName = time()  . '_post_image.' . $file->getClientOriginalExtension();

        $this->postImageRepository->saveImage(File::get($file), $fileName);

        $params['asset_url'] =  'storage/images/posts/';
        $params['asset'] = $fileName;

        return $params;

    } 

       /**
     * @param StoreRequest $request
     * @param array $params
     */
    public function saveImageMultiple($file, $iter): array
    {
      //  $file = $request->file('image');

        $params = [];

        $fileName = time() .$iter . '_post_image.' . $file->getClientOriginalExtension();

        $this->postImageRepository->saveImage(File::get($file), $fileName);

        $params['asset_url'] =  'storage/images/posts/';
        $params['asset'] = $fileName;

        return $params;

    } 
}

