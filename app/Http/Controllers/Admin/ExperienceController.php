<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Experience;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Repositories\ExperienceRepository;
use Illuminate\Support\Facades\File;

use App\Http\Requests\Experience\StoreRequest;
use App\Repositories\ExperienceVideoRepository;
use App\Http\Requests\Experience\UpdateRequest;

class ExperienceController extends Controller
{
    /** @var ExperienceRepository */
    protected $experienceRepository;

    /** @var ExperienceVideoRepository */
    protected $experienceVideoRepository;

    public function __construct(
        ExperienceRepository $experienceRepository,
        ExperienceVideoRepository $experienceVideoRepository
    ) {
        $this->middleware('auth:admin');

        $this->experienceRepository = $experienceRepository;
        $this->experienceVideoRepository = $experienceVideoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        try {
            $params = $this->experienceRepository->transformParameters($request->all());
            $query = $this->experienceRepository->search($params, null);
            $total = $query->count();
            $items = $this->experienceRepository->customPagination($query, $params, $request->get('page'), $total);
    
            return view('admin.pages.experiences.index', compact('items'))
                ->nest('filters', 'admin.pages.experiences.filters', compact('params', 'total'))
                ->nest('table', 'admin.pages.experiences.table', compact('items'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function store(Request $request)
{
    try {
        $experience = new Experience;
        $experience->nombre = $request->input('nombre');
        $experience->description = $request->input('description');
        if (!$request->filled('description')) {
            return back()->with('alert', [
                'title' => '¡Advertencia!',
                'message' => 'Debe escribir una descripción.',
                'icon' => 'warning'
            ]);
        }
        $date = $request->input('date');
        if (!$request->filled('date')) {
            return back()->with('alert', [
                'title' => '¡Advertencia!',
                'message' => 'Debe seleccionar una fecha.',
                'icon' => 'warning'
            ]);
        }
        $experience->date = $date;
        
        $experience->save();

        $videoParams = $request->only(['video']);
        if ($videoParams != null) {
            $video = substr($videoParams['video'], -11);
            $videoParams['experience_id'] = $experience->id;
            $videoParams['asset_url'] = $video;
            $videoParams['is_header'] = 1;
            unset($videoParams['video']);
            $this->experienceVideoRepository->create($videoParams);
        }

        return redirect()->route('admin.experiences')->with('alert', [
            'title' => '¡Éxito!',
            'message' => 'Se ha registrado correctamente.',
            'icon' => 'success'
        ]);
    } catch (\Exception $th) {
        dd($th);
        DB::rollBack();

        return back()->with('alert', [
            'title' => '¡Error!',
            'message' => 'No se ha podido registrar correctamente. ' . $th->getMessage(),
            'icon' => 'error'
        ]);
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
            $experienceParams = $request->only(['nombre', 'description', 'date']);
            $videoParams = $request->only(['video']);
    
            $experience = $this->experienceRepository->getById($id);
            $video = $this->experienceVideoRepository->getByAttribute('experience_id', $experience->id);
    
            $this->experienceRepository->update($experience, $experienceParams);
            $this->experienceVideoRepository->update($video, $videoParams);
    
            return redirect()->route('admin.experiences')->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
            
        } catch (\Exception $th) {

            return redirect()->route('admin.experiences')->with('alert', ['title' => __('messages.error'), 'icon' => 'error', 'text' => $th->getMessage()]);
            
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
            $experience = $this->experienceRepository->all();

            return view('admin.pages.experiences.create');
        } catch (\Throwable $th) {
            //throw $th;
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
            $item = $this->experienceRepository->getById($id);
            if ($item->getCountVideo() >= 0 && !(is_null($item->videoHeader()))) {
                $videoHeader = $item->videoHeader();
                $videos = $item->videos()->whereNotIn('id', [$videoHeader->id])->get();
            }
            if ($item->getCountVideo() >= 0 && !(is_null($item->videoHeader()))) {
                return view('admin.pages.experiences.edit', compact('item', 'videoHeader', 'videos'));
        }
     } catch (\Exception $th) {
            dd($th);
            return redirect()->route('admin.experiences')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }


    public function store_image(StoreRequestImage $request, $experience_id){
        try {
            DB::beginTransaction();
            $experience = $this->experienceRepository->getById($experience_id);

            $paramsRequest = $request->all();

             //dd($paramsRequest);

            // $paramsRequest =  $request->all();

             if (!($request->file('video') == null)) {
                 /** Saving Photo */
                 $fileParams = $this->saveVideo($paramsRequest['video']);
             }
 
            
             $experienceVideoParams['experience_id'] = $experience->id;
             $experienceVideoParams['is_header'] = 1;
 
             $experienceVideo = array_merge($experienceVideoParams,  $fileParams);
         
 
 
             $this->experienceVideoRepository->create($experienceVideo);



            DB::commit();

            return redirect()->route('admin.experience.video', $experience->id)->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
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
    public function destroy($id)
    {
        try {
            $experience = $this->experienceRepository->getById($id);

            DB::beginTransaction();
            
            $this->experienceRepository->delete($experience);

            DB::commit();

            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }
    }

}
