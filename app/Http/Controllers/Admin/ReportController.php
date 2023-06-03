<?php

namespace App\Http\Controllers\Admin;
use App\Models\SituationsGraduates;
use App\Http\Controllers\Controller;
use App\Repositories\SituationGraduateRepository;
use App\Http\Requests\SituationGraduate\StoreRequest;
use App\Http\Requests\SituationGraduate\UpdateRequest;
use App\Repositories\PostRepository;
use App\Repositories\PersonCompanyRepository;
use App\Repositories\UserRepository;
use App\Repositories\CountryRepository;
use App\Repositories\PersonAcademicRepository;
use App\Repositories\RoleRepository;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

use Faker\Generator as Faker;

use function PHPSTORM_META\map;

class ReportController extends Controller
{
  

    /** @var SituationGraduateRepository */
    protected $situationGraduateRepository;

    /** @var PostRepository */
    protected $postRepository;

    /** @var PersonCompanyRepository */
    protected $personCompanyRepository;

    /** @var UserRepository */
    protected $userRepository;

    /** @var CountryRepository */
    protected $countryRepository;

    /** @var PersonAcademicRepository */
    protected $personAcademicRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    /** @var Faker */
    protected $faker;

    public function __construct(
        
        SituationGraduateRepository $situationGraduateRepository,
        PostRepository $postRepository,
        PersonCompanyRepository $personCompanyRepository,
        UserRepository $userRepository,
        CountryRepository $countryRepository,
        PersonAcademicRepository $personAcademicRepository,
        RoleRepository $roleRepository,
        Faker $faker,
    ) {
        $this->middleware('auth:admin');

        
        $this->situationGraduateRepository=$situationGraduateRepository;
        $this->postRepository=$postRepository;
        $this->personCompanyRepository=$personCompanyRepository;
        $this->userRepository=$userRepository;
        $this->countryRepository=$countryRepository;
        $this->personAcademicRepository=$personAcademicRepository;
        $this->roleRepository=$roleRepository;
        $this->faker = $faker;
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
        
        

        return view('admin.pages.situacionGraduados.index')
            ->nest('filters','admin.pages.situacionGraduados.filters', compact('aniosGraduacion'))
            ->nest('table','admin.pages.situacionGraduados.table', compact( 'datos','datos2'));
    } catch (\Throwable $th) {
        return redirect()->route('admin.situacionGraduados.index')->with('alert', [
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

        return view('admin.pages.SituacionGraduados.index-table-filtrered', compact('datosFiltrados'))
            ->nest('filters', 'admin.pages.situacionGraduados.filters', compact('aniosGraduacion'))
            ->nest('tableFiltrada', 'admin.pages.SituacionGraduados.tableFiltrada', compact( 'datosFiltrados', 'anio','cantidadRegistros','datos'));
    }
}

    public function createSituation(){
        return view('admin.pages.SituacionGraduados.create');
    }

    public function edit($anio_graduation,$anio_actual){
        try {
            $item = DB::table('situations_graduates')->where('anio_graduation', $anio_graduation)->where('anio_actual', $anio_actual)->first();
            
           
            return view('admin.pages.SituacionGraduados.edit', compact('item'));
        }
        catch (\Exception $th) {
            return redirect()->route('admin.SituacionGraduados.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }

    public function update(UpdateRequest $request, $anio_graduation, $anio_actual)
{
    try {
        $situacionGraduate = SituationsGraduates::where('anio_graduation', $anio_graduation)
            ->where('anio_actual', $anio_actual)
            ->firstOrFail();

        $situacionGraduate->anio_graduation = intval($request->input('anio_graduation'));
        $situacionGraduate->graduados = intval($request->input('graduados'));
        $situacionGraduate->anio_actual = intval($request->input('anio_actual'));
        $situacionGraduate->independientes = intval($request->input('independientes'));
        $situacionGraduate->dependientes = intval($request->input('dependientes'));
        $situacionGraduate->desempleados = intval($request->input('desempleados'));
        $situacionGraduate->trabajando = round((($situacionGraduate->independientes + $situacionGraduate->dependientes) / ($situacionGraduate->independientes + $situacionGraduate->dependientes + $situacionGraduate->desempleados)) * 100, 2);
        $suma = $situacionGraduate->desempleados + $situacionGraduate->dependientes + $situacionGraduate->independientes;

        if ($situacionGraduate->graduados !== $suma) {
            throw new \Exception('El valor ingresado en "graduados" debe ser igual a la suma de "desempleados", "dependientes" e "independientes".');
        }

        $situacionGraduate->save();

        return redirect()->route('admin.situacionGraduados.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha actualizado correctamente.', 'icon' => 'success']);
    } catch (\Exception $th) {
        return back()->with('alert', [
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
                      ->where('anio_actual', $anio_actual);
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
            $situacionGraduate->anio_graduation = intval($request->input('anio_graduation'));
            $situacionGraduate->graduados = intval($request->input('graduados'));
            $situacionGraduate->anio_actual = intval($request->input('anio_actual'));
            $situacionGraduate->independientes = intval($request->input('independientes'));
            $situacionGraduate->dependientes = intval($request->input('dependientes'));
            $situacionGraduate->desempleados = intval($request->input('desempleados'));
            $situacionGraduate->trabajando = round((($situacionGraduate -> independientes + $situacionGraduate -> dependientes)/($situacionGraduate -> independientes + $situacionGraduate -> dependientes+ $situacionGraduate -> desempleados))*100,2);
            $suma = $situacionGraduate->desempleados + $situacionGraduate->dependientes + $situacionGraduate->independientes;
            if ($situacionGraduate->graduados !== $suma) {
                throw new \Exception('El valor ingresado en "graduados" debe ser igual a la suma de "desempleados", "dependientes" e "independientes".');
            }
            $situacionGraduate->save();
        

            return redirect()->route('admin.situacionGraduados.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        }catch (\Exception $th) {
            DB::rollBack();
            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente. Verifica que los datos ya no esten registrados o que los datos ingresados concuerden.', 'icon' => 'error']);
        }
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
    dd($registro);
    if($registro){
        $registro->delete();
        return view('admin.pages.SituacionGraduados.table')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success'], compact('registro'));
    }else{
        return redirect()->back()->with('error', 'No se pudo eliminar el registro');
    }
}
}
