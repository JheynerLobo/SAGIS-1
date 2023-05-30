<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Empleo;
use App\Models\EmpleoImage;

use App\Repositories\EmpleoRepository;
use Illuminate\Support\Facades\File;

use App\Http\Requests\Empleos\StoreRequest;
use App\Repositories\EmpleoImageRepository;
use App\Http\Requests\Empleos\UpdateRequest;
use App\Http\Requests\Empleos\StoreRequestImage;
use App\Http\Requests\Empleos\UpdateRequestImage;

class EmpleosController extends Controller
{
    /** @var EmpleoRepository */
    protected $empleoRepository;

    /** @var EmpleoImageRepository */
    protected $empleoImageRepository;


    public function __construct(
        EmpleoRepository $empleoRepository,
        EmpleoImageRepository $empleoImageRepository
    ) {
        $this->middleware('auth:admin');

        $this->empleoRepository = $empleoRepository;
        $this->empleoImageRepository =  $empleoImageRepository;
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

        DB::rollback();

        $request->validate([
            'empresa' => 'required|string',
            'cargo' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'url_postulation' => 'nullable|string',
            'imagen' => 'nullable|image|max:1024',
        ]);
    
        // Crear un nuevo registro en la entidad Empleo
        $empleo = new Empleo;
        $empleo->empresa = $request->input('empresa');
        $empleo->cargo = $request->input('cargo');
        $empleo->description = $request->input('description');
        $empleo->date = $request->input('date');
        $empleo->url_postulation = $request->input('url_postulation');
        $empleo->save();
    
      
        if ($request->hasFile('imagen')) {
            $imagen = new EmpleoImage;
            $imagen->empleo_id = $empleo->id;
            $imagen->asset_url = $request->file('imagen')->store('empleos', 'empleos');
            $imagen->asset = $request->file('imagen')->getClientOriginalName();
            $imagen->is_header = 1;
            $imagen->save();
        }

        return redirect()->route('admin.empleos.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
            } catch (\Exception $th) {
                dd($th);
                DB::rollBack();
    
                return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        try{

            $item=Empleo::find($id);
            $image=EmpleoImage::where('empleo_id'==$id);
            $imageHeader = $item->imageHeader();
            
                return view('admin.pages.empleos.edit', compact('item','image','imageHeader'));

        }
        catch(\Exception $th) {
           

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);

        }

    }

    public function update(UpdateRequest $request, $id) {
        try {
            $empleoParams = $request->only(['empresa', 'cargo','description', 'date', 'url_postulation']);
    
            $empleo = $this->empleoRepository->getById($id);
    
            $this->empleoRepository->update($empleo, $empleoParams);
            
            if (!($request->file('imagen') == null)) {
                
                $fileParams = $this->saveImage($paramsImagen['imagen']);
            }
            $empleoImage = $this->empleoImageRepository->getByAttribute("empleo_id", $empleo->id);
            
            if(is_null($empleoImage)){
                if (!($request->file('imagen') == null)) {
                    $empleoImgParams['empleo_id'] = $empleo->id;
                    $empleoImgParams['is_header'] = 1;
                    $empleoImg = array_merge($empleoImgParams,  $fileParams);
                    $this->empleoImageRepository->create($empleoImg);
                }
            }else{
                if (!($request->file('imagen') == null)) {
                    $empleoImgParams['empleo_id'] = $empleo->id;
                    $empleoImgParams['is_header'] = 1;
                    $empleoImg = array_merge($empleoImgParams,  $fileParams);
                  $this->empleoImageRepository->update($empleoImage, $empleoImg);
                }
            }
    
            return redirect()->route('admin.empleos.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha actualizado correctamente.', 'icon' => 'success']);
        }
        catch (\Exception $th) {
            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido actualizar correctamente.', 'icon' => 'error']);

        }
    }

    public function destroy($id){
        try {
            $empleo = $this->empleoRepository->getById($id);

            DB::beginTransaction();
            
            $this->empleoRepository->delete($empleo);

            DB::commit();

            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }

    }

    }
        

