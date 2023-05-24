<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Graduates;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Repositories\GraduatesRepository;
use Illuminate\Support\Facades\File;

use App\Http\Requests\GraduateQuality\StoreRequest;
use App\Repositories\GraduateVideoRepository;
use App\Http\Requests\GraduateQuality\UpdateRequest;

class GraduateQualityController extends Controller
{
    /** @var GraduatesRepository */
    protected $graduatesRepository;

    /** @var GraduateVideoRepository */
    protected $graduateVideoRepository;

    public function __construct(
        GraduatesRepository $graduatesRepository,
        GraduateVideoRepository $graduateVideoRepository
    ) {
        $this->middleware('auth:admin');

        $this->graduatesRepository = $graduatesRepository;
        $this->graduateVideoRepository = $graduateVideoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        try {
            $params = $this->graduatesRepository->transformParameters($request->all());
            $query = $this->graduatesRepository->search($params, null);
            $total = $query->count();
            $items = $this->graduatesRepository->customPagination($query, $params, $request->get('page'), $total);
    
            return view('admin.pages.GraduatesQuality.index', compact('items'))
                ->nest('filters', 'admin.pages.GraduatesQuality.filters', compact('params', 'total'))
                ->nest('table', 'admin.pages.graduatesQuality.table', compact('items'));
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
            $graduate = $this->graduatesRepository->all();

            return view('admin.pages.graduatesQuality.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request){
        try{
        $graduate = new Graduates;
        $graduate -> nombre = $request->input('nombre');
        $graduate -> description = $request->input('description');
        $graduate -> date = $request->input('date');
        $graduate->save();

     
        $videoParams = $request->only(['video']);
        if($videoParams!=null){
            $video = substr($videoParams['video'], -11);
            $videoParams['graduates_id'] = $graduate->id;
            $videoParams['asset_url'] = $video;
            $videoParams['is_header'] = 1;
            unset($videoParams['video']);
            $this->graduateVideoRepository->create($videoParams);}

            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
        }
    }




        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id) {
        try {
            $graduateParams = $request->only(['nombre', 'description', 'date']);
            $videoParams = $request->only(['video']);
    
            $graduate = $this->graduatesRepository->getById($id);
            $video = $this->graduateVideoRepository->getByAttribute('graduates_id', $graduate->id);
    
            $this->graduatesRepository->update($graduate, $graduateParams);
            $this->graduateVideoRepository->update($video, $videoParams);
    
            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
            
        } catch (\Exception $th) {

            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
            
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
            $item = $this->graduatesRepository->getById($id);
            if ($item->getCountVideo() >= 0 && !(is_null($item->videoHeader()))) {
                $videoHeader = $item->videoHeader();
                $videos = $item->videos()->whereNotIn('id', [$videoHeader->id])->get();
            }
            if ($item->getCountVideo() >= 0 && !(is_null($item->videoHeader()))) {
                return view('admin.pages.graduatesQuality.edit', compact('item', 'videoHeader', 'videos'));
        }
     } catch (\Exception $th) {
            dd($th);
            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }


    public function store_image(StoreRequestImage $request, $graduate_id){
        try {
            DB::beginTransaction();
            $graduateQuality = $this->graduatesRepository->getById($graduate_id);

            $paramsRequest = $request->all();

             //dd($paramsRequest);

            // $paramsRequest =  $request->all();

             if (!($request->file('video') == null)) {
                 /** Saving Photo */
                 $fileParams = $this->saveVideo($paramsRequest['video']);
             }
 
            
             $graduateVideoParams['graduates_id'] = $graduate->id;
             $graduateVideoParams['is_header'] = 1;
 
             $graduateVideo = array_merge($graduateVideoParams,  $fileParams);
         
 
 
             $this->graduateVideoRepository->create($graduateVideo);



            DB::commit();

            return redirect()->route('admin.graduateQuality.video', $graduateQuality->id)->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            dd($th);
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
    public function delete($id)
    {
        try {
            $graduate = $this->graduatesRepository->getById($id);

            DB::beginTransaction();
            
            $this->graduatesRepository->delete($graduate);

            DB::commit();

            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }
    }

}   