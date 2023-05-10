<?php

namespace App\Http\Controllers\Admin;
use App\Models\SituationsGraduates;
use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use App\Repositories\PersonAcademicRepository;
use App\Repositories\PersonCompanyRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PostRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\SituationGraduateRepository;
use App\Http\Requests\SituationGraduate\StoreRequest;
use App\Http\Requests\SituationGraduate\UpdateRequest;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

use Faker\Generator as Faker;

use function PHPSTORM_META\map;

class ReportController extends Controller
{
    /** @var PersonRepository */
    protected $personRepository;

    /** @var UserRepository */
    protected $userRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    /** @var PostRepository */
    protected $postRepository;

    /** @var CountryRepository */
    protected $countryRepository;

    /** @var PersonCompanyRepository */
    protected $personCompanyRepository;

    /** @var PersonAcademicRepository */
    protected $personAcademicRepository;

    /** @var SituationGraduateRepository */
    protected $situationGraduateRepository;

    /** @var Faker */
    protected $faker;

    public function __construct(
        PersonRepository $personRepository,
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        PostRepository $postRepository,
        CountryRepository $countryRepository,
        PersonCompanyRepository $personCompanyRepository,
        PersonAcademicRepository $personAcademicRepository,
        SituationGraduateRepository $situationGraduateRepository,
        Faker $faker,
    ) {
        $this->middleware('auth:admin');

        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->postRepository = $postRepository;
        $this->countryRepository = $countryRepository;
        $this->personCompanyRepository = $personCompanyRepository;
        $this->personAcademicRepository = $personAcademicRepository;
        $this->situationGraduateRepository=$situationGraduateRepository;
        $this->faker = $faker;
    }

    public function graduates()
    {
        try {
            $graduateRole = $this->roleRepository->getByAttribute('name', 'graduate');
            $items = $graduateRole->users;

            return view('admin.pages.reports.graduates', compact('items'));
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function index_estadisticas(Request $request){
        try {
            $params = $this->situationGraduateRepository->transformParameters($request->all());
            $query = $this->situationGraduateRepository->search($params, null);
            $selectedYear = $request->input('anio');
            $datos = DB::table('situations_graduates')
                ->orderBy('anio_graduation')
                ->get();

              /*  $resultados = DB::table('situations_graduates')
                ->select('anio_graduation', DB::raw('SUM(trabajando) as total'))
                ->groupBy('anio_graduation')
                ->get();

                $registros = DB::table('situations_graduates')->groupBy('anio_graduation')->selectRaw('anio_graduation, count(*) as total')->get();*/

       
                
                $aniosGraduacion = situationsGraduates::orderBy('anio_graduation')->pluck('anio_graduation');
            $items = $this->situationGraduateRepository->customPagination($query, $params, $request->get('page'));

        return view('admin.pages.situacionGraduados.index')
        ->nest('filters','admin.pages.situacionGraduados.filters', compact('aniosGraduacion'))
        ->nest('table','admin.pages.situacionGraduados.table', compact('items', 'datos'));
        }
        catch (\Throwable $th) {
            return redirect()->route('admin.situacionGraduados.index')->with('alert', [
                'title' => '¡Error!',
                'icon' => 'error',
                'message' => 'No hemos podido Agregar  ese registro verifica los datos ingresados y el que has ingresado.'
            ]);
        }
    }

    /*public function index_estadisticas_graduates(Request $request){
        try {
            $params = $this->situationGraduateRepository->transformParameters($request->all());
            $query = $this->situationGraduateRepository->search($params, null);
            $datos = DB::table('situations_graduates')
                ->orderBy('anio_graduation')
                ->get();

                $resultados = DB::table('situations_graduates')
                ->select('anio_graduation', DB::raw('SUM(trabajando) as total'))
                ->groupBy('anio_graduation')
                ->get();

                $registros = DB::table('situations_graduates')->groupBy('anio_graduation')->selectRaw('anio_graduation, count(*) as total')->get();

                $item = SituationsGraduates::where('anio_graduation', $anioGraduation)
            ->where('anio_actual', $anioActual)
            ->first();
                $aniosGraduacion = situationsGraduates::orderBy('anio_graduation')->pluck('anio_graduation');
            $items = $this->situationGraduateRepository->customPagination($query, $params, $request->get('page'));

        return view('pages.SituacionGraduados.index')
        ->nest('filters','pages.situacionGraduados.filters', compact('aniosGraduacion'))
        ->nest('table','pages.situacionGraduados.table', compact('items', 'datos','item'));
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }*/

    public function filtrarPorAnio(Request $request)
{
    $anio = $request->input('anio_graduation');
    $params = $this->situationGraduateRepository->transformParameters($request->all());
    $query = $this->situationGraduateRepository->search($params, null);
   
    $datosFiltrados = DB::table('situations_graduates')->whereYear('created_at', $anio)->get();

    $aniosGraduacion = DB::table('situations_graduates')->orderBy('anio_graduation')->pluck('anio_graduation');
            $items = $this->situationGraduateRepository->customPagination($query, $params, $request->get('page'));

    return view('admin.pages.SituacionGraduados.index-table-filtrered', ['datos' => $datosFiltrados])
    ->nest('filters','admin.pages.situacionGraduados.filters', compact('aniosGraduacion'))
        ->nest('tableFiltrada','admin.pages.SituacionGraduados.tableFiltrada', ['items', 'datos' => $datosFiltrados]);;
}

    public function createSituation(){
        return view('admin.pages.SituacionGraduados.create');
        
    }

    public function edit($anio_graduation,$anio_actual){
        try {
            $item = DB::table('situations_graduates')->where('anio_graduation', $anio_graduation)->where('anio_actual', $anio_actual)->first();
            
           if(!$item) {
            abort(404);
        }
            return view('admin.pages.SituacionGraduados.edit', compact('item'));
        }
        catch (\Exception $th) {
            return redirect()->route('admin.SituacionGraduados.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }

    public function update(UpdateRequest $request, $anio_graduation, $anio_actual) {
        try {
            
            $item = SituationsGraduates::where('anio_graduation', $anio_graduation)
                ->where('anio_actual', $anio_actual)
                ->firstOrFail();

               
    
            $item->anio_graduation = intval($request->input('anio_graduation'));
            $item->anio_actual = intval($request->input('anio_actual'));
            $item->graduados = intval($request->input('graduados'));
            $item->independientes = intval($request->input('independientes'));
            $item->dependientes = intval($request->input('dependientes'));
            $item->desempleados = intval($request->input('desempleados'));
            $item -> trabajando = round((($item -> independientes + $item -> dependientes)/($item -> independientes + $item -> dependientes+ $item -> desempleados))*100,2);
            
            $item->save();        
    
            return redirect()->route('admin.situacionGraduados.index')->with('alert', [
                'title' => '¡Éxito!',
                'icon' => 'success',
                'message' => 'Se ha actualizado correctamente.'
            ]);
        } catch(\Exception $th) {
           
            return redirect()->route('admin.situacionGraduados.index')->with('alert', [
                'title' => '¡Error!',
                'icon' => 'error',
                'message' => 'No hemos podido actualizar esta publicación.'
            ]);
        }
    }

    public function delete($anio_graduation, $anio_actual)
{
    try{
    $item = SituationsGraduates::where('anio_graduation', $anio_graduation)
                      ->where('anio_actual', $anio_actual)
                      ->first();
    
    $item->delete();
    
    return redirect()->route('admin.situacionGraduados.index')->with('alert', ['title' => '¡Éxito!',
        'icon' => 'success',
        'message' => 'El registro se ha eliminado correctamente.']);
    }
    catch(\Exception $th) {
        return redirect()->route('admin.situacionGraduados.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido Eliminar este registro.']);

    }
}

    public function store(StoreRequest $request){
        try{
            $situacionGraduate = new SituationsGraduates;
            $situacionGraduate -> anio_graduation = $request->input('anio_graduation');
            $situacionGraduate -> anio_actual = $request->input('anio_actual');
            $situacionGraduate -> graduados = $request->input('graduados');
            $situacionGraduate -> independientes = $request->input('independientes');
            $situacionGraduate -> dependientes = $request->input('dependientes');
            $situacionGraduate -> desempleados = $request->input('desempleados');
            $situacionGraduate -> trabajando = round((($situacionGraduate -> independientes + $situacionGraduate -> dependientes)/($situacionGraduate -> independientes + $situacionGraduate -> dependientes+ $situacionGraduate -> desempleados))*100,2);
            $situacionGraduate->save();

            
            return redirect()->route('admin.situacionGraduados.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);}
          catch (\Exception $th) {

            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente. Verifica que los datos ya no esten registrados.', 'icon' => 'error']);
        }
    }
    
    public function statistics()
    {
        try {
            /* Número total de pots */
            $posts = $this->postRepository->getTotalPosts()->count();
           // dd($pots);

            /** Graduados en el Extranjero */
            $extraGraduates = $this->personCompanyRepository->searchExtranjeroGraduates()->count();

            /** Cantidad de Graduados */
            $graduates = $this->userRepository->getByRole('graduate')->count();

            /** Salary MIN */
            $salaryMin = $this->personCompanyRepository->getSalary()->min('salary');

            /** Salary MAX */
            $salaryMax = $this->personCompanyRepository->getSalary()->max('salary');

            /** With Job */
            $graduadosConTrabajo = $this->personCompanyRepository->graduadosConTrabajo();

            /* Graduados sin Trabajo */
            $graduadoSinTrabajo = $graduates  -$graduadosConTrabajo;

            /** Countries */
            $countries = $this->countryRepository->all()->map(function ($map) {
                return $map->name;
            });

            /* Countries workings */

            $countriesWorking = $this->personCompanyRepository->graduatesByCountryName()->map(function ($map) {
                return $map->name;
            });

           /*  dd($countries); */
            /** Worker by Countries */
            $graduatesByCountry = $this->personCompanyRepository->graduatesByCountry();

            $arrayColors = $graduatesByCountry->map(function ($map) {
                return $this->faker->unique()->hexColor;
            });

            /** Graduates by Year */
            $graduatesByYear = $this->personAcademicRepository->graduatesByYear();

            $years = $graduatesByYear->map(function ($map) {
                return $map->year;
            });

            $graduatesByYearTotals = $graduatesByYear->map(function ($map) {
                return $map->total;
            });

            // return $years;

            return view('admin.pages.reports.statistics', compact(
                'extraGraduates',
                'graduates',
                'salaryMin',
                'salaryMax',
                'graduadosConTrabajo',
                'countries',
                'graduatesByCountry',
                'arrayColors',
                'years',
                'graduatesByYearTotals',
                'posts', 'graduadoSinTrabajo',
               'countriesWorking'
                
            ));
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function eliminarRegistro($anio_graduation, $anio_actual)
{
    $registro = situations_graduates::where('anio_graduation', $anio_graduacion)->where('anio_actual', $anio_actual)->first();

    if($registro){
        $registro->delete();
        return view('admin.pages.SituacionGraduados.table')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success'], compact('registro'));
    }else{
        return redirect()->back()->with('error', 'No se pudo eliminar el registro');
    }
}
}
