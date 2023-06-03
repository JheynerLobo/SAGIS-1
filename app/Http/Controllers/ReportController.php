<?php

namespace App\Http\Controllers;
use App\Models\SituationsGraduates;
use App\Http\Controllers\Controller;
use App\Repositories\SituationGraduateRepository;
use App\Http\Requests\SituationGraduate\StoreRequest;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

use Faker\Generator as Faker;

use function PHPSTORM_META\map;

class ReportController extends Controller
{
   
    /** @var SituationGraduateRepository */
    protected $situationGraduateRepository;

    /** @var Faker */
    protected $faker;

    /** @var string */
    protected $viewLocation = 'pages.';

    public function __construct(
        SituationGraduateRepository $situationGraduateRepository,
        Faker $faker,
    ) {

        
        $this->situationGraduateRepository=$situationGraduateRepository;
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