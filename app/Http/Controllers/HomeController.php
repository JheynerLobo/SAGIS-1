<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\PostRepository;
use App\Repositories\PostImageRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\EmpleoRepository;
use App\Repositories\GraduatesRepository;
use App\Repositories\SituationGraduateRepository;
use App\Http\Requests\Filters\EventFilterRequest;
use App\Http\Requests\Filters\VideoFilterRequest;
use App\Http\Requests\Filters\CourseFilterRequest;
use App\Http\Requests\Filters\NoticeFilterRequest;
use App\Http\Requests\Filters\GalleryFilterRequest;
use App\Http\Requests\Filters\EmpleoFilterRequest;
use Illuminate\Support\Facades\DB;
use App\Models\SituationsGraduates;


class HomeController extends Controller
{
    /** @var PostCategoryRepository */
    protected $postCategoryRepository;

    /** @var PostRepository */
    protected $postRepository;

    protected $postImageRepository;

    /** @var ExperienceRepository */
    protected $experienceRepository;

    /** @var EmpleoRepository */
    protected $empleoRepository;

    /** @var GraduatesRepository */
    protected $graduatesRepository; 

    /** @var SituationGraduateRepository */
    protected $situationGraduateRepository;

    /** @var string */
    protected $viewLocation = 'pages.';

    public function __construct(
        PostCategoryRepository $postCategoryRepository,
        PostRepository $postRepository,
        PostImageRepository $postImageRepository,
        ExperienceRepository $experienceRepository,
        EmpleoRepository $empleoRepository,
        GraduatesRepository $graduatesRepository,
        SituationGraduateRepository $situationGraduateRepository
    ) {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
        $this->postImageRepository =  $postImageRepository;
        $this->experienceRepository=$experienceRepository;
        $this->empleoRepository=$empleoRepository;
        $this->graduatesRepository=$graduatesRepository;
        $this->situationGraduateRepository=$situationGraduateRepository;;
    }

    public function home()
    {
       
      $postGalery = $this->postImageRepository->getPotsGaleria();
        return view('pages.home', compact('postGalery'));
    }

    public function notices(NoticeFilterRequest $request)
    {
        $postNotice = $this->postCategoryRepository->getByAttribute('name', 'Noticias');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postNotice->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'notices.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'notices.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'notices.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showNotice($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            if($item->getCountVideo()>0){
                $videoHeader = $item->videoHeader();
                //$videos =$item->videos()->whereNotIn('id', [$videoHeader->id])->get();
                return view($this->viewLocation . 'notices.show', compact('item', 'imageHeader', 'images', 'videoHeader'));
            }else{

                return view($this->viewLocation . 'notices.show', compact('item', 'imageHeader', 'images'));
            }
           

            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function courses(CourseFilterRequest $request)
    {
        $postCourse = $this->postCategoryRepository->getByAttribute('name', 'Cursos');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postCourse->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'courses.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'courses.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'courses.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showCourse($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();


            if($item->getCountVideo()>0){
                $videoHeader = $item->videoHeader();
                return view($this->viewLocation . 'courses.show', compact('item', 'imageHeader', 'images', 'videoHeader'));
            }else{
                return view($this->viewLocation . 'courses.show', compact('item', 'imageHeader', 'images'));
            }
          
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function events(EventFilterRequest $request)
    {
        $postEvent = $this->postCategoryRepository->getByAttribute('name', 'Eventos');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postEvent->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'events.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'events.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'events.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showEvent($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();


            
            if($item->getCountVideo()>0){
                $videoHeader = $item->videoHeader();
                return view($this->viewLocation . 'events.show', compact('item', 'imageHeader', 'images', 'videoHeader'));
            }else{
                return view($this->viewLocation . 'events.show', compact('item', 'imageHeader', 'images'));
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function gallerys(GalleryFilterRequest $request)
    {
        $postGallery = $this->postCategoryRepository->getByAttribute('name', 'Galería');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postGallery->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'gallerys.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'gallerys.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'gallerys.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showGallery($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view($this->viewLocation . 'gallerys.show', compact('item', 'imageHeader', 'images'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function videos(VideoFilterRequest $request)
    {
        $postGallery = $this->postCategoryRepository->getByAttribute('name', 'Videos');

        try {
            
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postGallery->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'videos.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'videos.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'videos.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }


        /**
     * @param int $id
     */
    public function showVideo($id)
    {
        try {
            $item = $this->postRepository->getById($id);
                    
            if($item->getCountVideo()>0 && !is_null($item->videoHeader())){
                $videoHeader = $item->videoHeader();
                return view($this->viewLocation . 'videos.show', compact('item', 'videoHeader'));
            }else{
                return view($this->viewLocation . 'videos.show', compact('item'));
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function experiences(VideoFilterRequest $request)
    {

        try {
            
            $params = $this->experienceRepository->transformParameters($request->all());
            $query = $this->experienceRepository->search($params);
            
            $total = $query->count();

            $items = $this->experienceRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'experiences.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'experiences.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'experiences.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }


        /**
     * @param int $id
     */
    public function showExperiences($id)
    {
        try {
            $item = $this->experienceRepository->getById($id);
                    
            if($item->getCountVideo()>0 && !is_null($item->videoHeader())){
                $videoHeader = $item->videoHeader();
                return view($this->viewLocation . 'experiences.show', compact('item', 'videoHeader'));
            }else{
                return view($this->viewLocation . 'experiences.show', compact('item'));
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function empleos(GalleryFilterRequest $request)
    {
        
        try {

            
            $params = $this->empleoRepository->transformParameters($request->all());    
            $query = $this->empleoRepository->search($params,null);         
            $total = $query->count();
            $items = $this->empleoRepository->customPagination($query, $params, $request->get('page'), $total);
            return view($this->viewLocation . 'empleos.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'empleos.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'empleos.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

   
        /**
     * @param int $id
     */
    public function showEmpleos($id)
    {
        try {
            $item = $this->empleoRepository->getById($id);
                   
            $imageHeader = $item->imageHeader();
                return view($this->viewLocation . 'empleos.show', compact('item', 'imageHeader'));
            
                return view($this->viewLocation . 'empleos.show', compact('item'));
            

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function meritosGraduado(GalleryFilterRequest $request){
        try{
        $params = $this->graduatesRepository->transformParameters($request->all());    
        $query = $this->graduatesRepository->search($params,null);         
        $total = $query->count();
        $items = $this->graduatesRepository->customPagination($query, $params, $request->get('page'), $total);
        return view($this->viewLocation . 'graduadosCalidad.index', compact('items'))
            ->nest('filters', $this->viewLocation . 'graduadosCalidad.filters', compact('params', 'total'))
            ->nest('table', $this->viewLocation . 'graduadosCalidad.table', compact('items'));
    } catch (Exception $th) {
        throw $th;
    }
}

/**
     * @param int $id
     */
    public function meritoGraduadoShow($id)
    {
        try {
            $item = $this->graduatesRepository->getById($id);
            if($item->getCountimage()>0){
            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();
            }

            
            if($item->getCountVideo()>0){
                $videoHeader = $item->videoHeader();
                return view($this->viewLocation . 'graduadosCalidad.show', compact('item', 'imageHeader', 'images', 'videoHeader'));
            }else{
                return view($this->viewLocation . 'graduadosCalidad.show', compact('item', 'imageHeader', 'images'));
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index_estadisticas(Request $request)
    {
        try {
            $selectedAnio = $request->input('anio_graduation'); // Obtener el valor del año seleccionado
    
            $params = $this->situationGraduateRepository->transformParameters($request->all());
            $query = $this->situationGraduateRepository->search($params, null);
            
            // Obtener todos los datos sin filtrar
            $datos = DB::table('situations_graduates')
                ->orderBy('anio_graduation')
                ->get();
    
                $datos2 = DB::table('situations_graduates')
                ->select('anio_graduation', DB::raw('AVG(trabajando) as promedio_trabajando'), DB::raw('COUNT(*) as cantidad_registros'))
                ->groupBy('anio_graduation')
                ->orderBy('anio_graduation')
                ->get();
                
    
            $aniosGraduacion = situationsGraduates::orderBy('anio_graduation')->pluck('anio_graduation');
            
            
    
        return view('pages.situacionGraduados.index')
            ->nest('filters','pages.situacionGraduados.filters', compact('aniosGraduacion'))
            ->nest('table','pages.situacionGraduados.table', compact( 'datos','datos2'));
        } catch (\Throwable $th) {
        return redirect()->route('situacionGraduados.index')->with('alert', [
                'title' => '¡Error!',
                'icon' => 'error',
                'message' => 'No hemos podido agregar ese registro. Verifica los datos ingresados.'
            ]);
        }
    }


    public function filtrarPorAnio(Request $request)
{
    $anio = intval($request->input('anio_selected'));

    if ($anio == 0) {
        return back()->with('alert', [
            'title' => '¡Error!',
            'icon' => 'error',
            'message' => 'Selecciona un año para filtrar.'
        ]);
    } else {
        $datosFiltrados = DB::table('situations_graduates')->where('anio_graduation', $anio)->get();

        $datos = DB::table('situations_graduates')
        ->select(DB::raw('AVG(trabajando) as promedio_trabajando'), DB::raw('COUNT(*) as cantidad_registros'))
        ->where('anio_graduation', $anio)
        ->get();
        $aniosGraduacion = DB::table('situations_graduates')->orderBy('anio_graduation')->pluck('anio_graduation');
        $cantidadRegistros = $datosFiltrados->count();

        return view('pages.SituacionGraduados.index-table-filtrered', compact('datosFiltrados'))
            ->nest('filters', 'pages.situacionGraduados.filters', compact('aniosGraduacion'))
            ->nest('tableFiltrada', 'pages.SituacionGraduados.tableFiltrada', compact( 'datosFiltrados', 'anio','cantidadRegistros','datos'));
    }
}


}
