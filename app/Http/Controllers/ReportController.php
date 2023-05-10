<?php

namespace App\Http\Controllers;
use App\Repositories\SituationGraduateRepository;
use App\Http\Requests\SituationGraduate\StoreRequest;
use App\Http\Requests\SituationGraduate\UpdateRequest;
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

    public function __construct(
     
        SituationGraduateRepository $situationGraduateRepository,
        Faker $faker,
    ) {
        
        $this->situationGraduateRepository=$situationGraduateRepository;
        $this->faker = $faker;
    }


  
    public function index_estadisticas_graduates(Request $request){
        try {
            $params = $this->situationGraduateRepository->transformParameters($request->all());
            $query = $this->situationGraduateRepository->search($params, null);
            $selectedYear = $request->input('anio');
            $datos = DB::table('situations_graduates')
                ->orderBy('anio_graduation')
                ->get();
                
                $aniosGraduacion = DB::table('situations_graduates')->orderBy('anio_graduation')->pluck('anio_graduation');
            $items = $this->situationGraduateRepository->customPagination($query, $params, $request->get('page'));

        return view('pages.SituacionGraduados.index')
        ->nest('filters','pages.situacionGraduados.filters', compact('aniosGraduacion'))
        ->nest('table','pages.situacionGraduados.table', compact('items', 'datos'));
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }


   

}