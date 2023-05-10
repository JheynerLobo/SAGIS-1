<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Empleos;

use App\Repositories\EmpleoRepository;
use Illuminate\Support\Facades\File;

use App\Http\Requests\Empleos\StoreRequest;
use App\Repositories\EmpleoImageRepository;
use App\Repositories\EmpleoVideoRepository;
use App\Http\Requests\Empleos\UpdateRequest;
use App\Http\Requests\Empleos\StoreRequestImage;
use App\Http\Requests\Empleos\UpdateRequestImage;

class EmpleosController extends Controller
{
    /** @var EmpleoRepository */
    protected $empleoRepository;

    /** @var EmpleoImageRepository */
    protected $empleoImageRepository;

    /** @var EmpleoVideoRepository */
    protected $empleoVideoRepository;

    public function __construct(
        EmpleoRepository $empleoRepository,
        EmpleoImageRepository $empleoImageRepository,
        EmpleoVideoRepository $empleoVideoRepository
    ) {
        $this->middleware('auth:admin');

        $this->empleoRepository = $empleoRepository;
        $this->empleoImageRepository =  $empleoImageRepository;
        $this->empleoVideoRepository = $empleoVideoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $params = $this->empleoRepository->transformParameters($request->all());
            $query = $this->empleoRepository->search($params, null);

            $total = $query->count();
            $items = $this->empleoRepository->customPagination($query, $params, $request->get('page'), $total);

            return view('admin.pages.Empleos.index', compact('items'))
                ->nest('filters', 'admin.pages.Empleos.filters', compact('params', 'total'))
                ->nest('table', 'admin.pages.Empleos.table', compact('items'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(){

        try {


            return view('admin.pages.empleos.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(StoreRequest $request){

        try{
            $empleo = new Empleo;
            $empleo -> empresaa = $request->input('empresa');
            $empleo -> cargo = $request->input('cargo');
            $empleo -> cargo = $request->input('description');
            $empleo -> date = $request->input('date');
            $empleo->save();
    
            $files = $request->file('image');
            $videoParams = $request->only(['video']);


           

                if(!is_null($videoParams['video'])){

                    $video = substr($videoParams['video'], -11);
                    $videoParams['empleo_id'] = $post->id;
                    $videoParams['asset_url'] = $video;
                    $videoParams['is_header'] = 1;
                    unset($videoParams['video']);

                    $this->empleoVideoRepository->create($videoParams);
                }

                $imageParams = $request->only(['image']);
        if($imageParams!=null){
            $image = substr($imageParams['image'], -11);
            $imageParams['empleo_id'] = $experience->id;
            $imageParams['asset_url'] = $video;
            $imageParams['is_header'] = 1;
            unset($imageParams['image']);
            $this->experienceVideoRepository->create($imageParams);}

                return redirect()->route('admin.experiences')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
            } catch (\Exception $th) {
                dd($th);
                DB::rollBack();
    
                return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
            }
        }

    }
