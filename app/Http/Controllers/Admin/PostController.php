<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;

use App\Repositories\PostRepository;
use App\Repositories\PostCategoryRepository;

class PostController extends Controller
{
    /** @var PostRepository */
    protected $postRepository;

    /** @var PostCategoryRepository */
    protected $postCategoryRepository;

    public function __construct(
        PostRepository $postRepository,
        PostCategoryRepository $postCategoryRepository
    ) {
        $this->middleware('auth:admin');

        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
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

            $this->postRepository->create($request->all());

            DB::commit();

            return redirect()->route('admin.posts.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
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

            return view('admin.pages.posts.edit', compact('item', 'postCategories'));

            return redirect()->route('admin.posts,edit', $id)->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
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
            DB::beginTransaction();

            $post = $this->postRepository->getById($id);

            $this->postRepository->update($post, $request->all());

            $this->postRepository->create($request->all());

            DB::commit();

            return redirect()->route('admin.posts.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha actualizado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
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
}
