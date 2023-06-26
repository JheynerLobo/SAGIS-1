<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Graduates;
use App\Models\GraduateImage;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Repositories\GraduatesRepository;
use Illuminate\Support\Facades\File;

use App\Http\Requests\GraduateQuality\StoreRequest;
use App\Repositories\GraduateVideoRepository;
use App\Repositories\GraduateImageRepository;
use App\Http\Requests\GraduateQuality\UpdateRequest;
use App\Http\Requests\GraduateQuality\UpdateRequestImage;
use App\Http\Requests\GraduateQuality\StoreRequestImage;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_YouTube_Video;
use Google_Service_YouTube_VideoSnippet;
use Google_Service_YouTube_VideoStatus;
use Google_Service_YouTube_VideoFileDetails;

class GraduateQualityController extends Controller
{
    /** @var GraduatesRepository */
    protected $graduatesRepository;

    /** @var GraduateImageRepository */
    protected $graduateImageRepository;

    /** @var GraduateVideoRepository */
    protected $graduateVideoRepository;

    public function __construct(
        GraduatesRepository $graduatesRepository,
        GraduateVideoRepository $graduateVideoRepository,
        GraduateImageRepository $graduateImageRepository
    ) {
        $this->middleware('auth:admin');

        $this->graduatesRepository = $graduatesRepository;
        $this->graduateVideoRepository = $graduateVideoRepository;
        $this->graduateImageRepository = $graduateImageRepository;
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

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
{
    try {
        DB::rollback();

        $request->validate([
            'nombre' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'video' => 'nullable|string',
            'imagen' => 'nullable|image|max:1024',
        ]);

        // Crear un nuevo registro en la entidad Graduates
        $graduate = new Graduates;
        $graduate->nombre = $request->input('nombre');
        $graduate->description = $request->input('description');
        $graduate->date = $request->input('date');
        $graduate->save();
        

        // ...

        $videoParams = $request->only(['video']);
        $graduate->url = $request->input('video');
        
        if ($graduate->url != null) {
            // Configurar la autenticación
            $client = new Google_Client();
            $client->setAuthConfig(base_path('Admin/credentials.json'));
            dd($client);
            $client->setScopes([
                'https://www.googleapis.com/auth/youtube.upload',
            ]);
            

            // Realizar la autenticación
            $client->fetchAccessTokenWithAssertion();

            // Obtener el token de acceso
            $accessToken = $client->getAccessToken();

            // Crear una instancia de Google_Service_YouTube
            $youtube = new Google_Service_YouTube($client);

            // Crear instancia de Google_Service_YouTube_Video
            $video = new Google_Service_YouTube_Video();

            // Crear instancia de Google_Service_YouTube_VideoSnippet
            $snippet = new Google_Service_YouTube_VideoSnippet();
            $snippet->setTitle('Reconocimiento del graduado: ' . $graduate->nombre);
            $snippet->setDescription('Video de reconocimiento a ' . $graduate->nombre . ' por méritos alcanzados');
            $snippet->setTags(['etiqueta1', 'etiqueta2']);

            // Establecer el snippet en el video
            $video->setSnippet($snippet);

            // Crear instancia de Google_Service_YouTube_VideoStatus
            $status = new Google_Service_YouTube_VideoStatus();
            $status->setPrivacyStatus('private');

            // Establecer el status en el video
            $video->setStatus($status);

            // Crear instancia de Google_Service_YouTube_VideoFileDetails
            $fileDetails = new Google_Service_YouTube_VideoFileDetails();
            $fileDetails->setFileName($graduate->url);

            // Establecer los detalles del archivo en el video
            $video->setFileDetails($fileDetails);

            $response = $youtube->videos->insert('snippet,status', $video, $insertParams);

            // Obtener el ID del video resubido
            $videoId = $response['id'];
        }

        DB::commit();
        return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
    } catch(\Exception $th) {
        DB::rollBack();
        $errorMessage = $th->getMessage();
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
    public function q($id)
{
    try {
        $item = $this->graduatesRepository->getById($id);


        if ($item->getCountimage() >= 1) {
            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();
             
            if ($item->getCountVideo() >= 1 && !(is_null($item->videoHeader()))) {
                $videoHeader = $item->videoHeader();
                $videos = $item->videos()->whereNotIn('id', [$videoHeader->id])->get();
            }
        } else if($item->getCountimage() == 0 ) {
            $videoHeader = $item->videoHeader();
            $videos = $item->videos()->whereNotIn('id', [$videoHeader->id])->get();
        }

        if ($item->getCountimage() >= 1) {

            if ($item->getCountVideo() >= 1 && !(is_null($item->videoHeader()))) {
                return view('admin.pages.graduatesQuality.edit', compact('item', 'imageHeader', 'images', 'videoHeader', 'videos'));
            } else {
                return view('admin.pages.graduatesQuality.edit', compact('item', 'imageHeader', 'images'));
            }
        } else {

            return view('admin.pages.graduatesQuality.edit', compact('item', 'videoHeader', 'videos'));
        }
    } catch (\Exception $th) {
        dd($th);
        return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
    }
}

    public function images($id){
        try {
            $item = $this->graduatesRepository->getById($id);

                if ($item->getCountimage() >= 1 && !(is_null($item->imageHeader()))) {
                     $imageHeader = $item->imageHeader();
                $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();
                    return view('admin.pages.graduatesQuality.images', compact('item', 'imageHeader', 'images'));
                } else {
                    return view('admin.pages.graduateQuality.images', compact('item'));
                }
            } 
         catch (\Exception $th) {
            dd($th);
            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }

    public function edit_image($graduate_id, $image_id){
       

        try {
            $item = $this->graduatesRepository->getById($graduate_id);
            $img = $this->graduateImageRepository->getById($image_id);

  /*           $postCategories = $this->postCategoryRepository->all(); */

            //dd($item->getCountimage());

        
              return view('admin.pages.graduatesQuality.edit_image', compact('item', 'img'));
                

            //return redirect()->route('admin.posts,edit', compact('item', 'postCategories', 'imageHeader', 'images'))->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
        } catch (\Exception $th) {
            dd($th);
            return redirect()->route('admin.graduatesQuality.images',$item->id)->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }
    }

    public function update_image(UpdateRequestImage $request, $graduate_id, $image_id){
        try {
            $graduate = $this->graduatesRepository->getById($graduate_id);
            $img = $this->graduateImageRepository->getById($image_id);

            $paramsRequest =  $request->all();
        

            if (!($request->file('image') == null)) {
                /** Saving Photo */
                $fileParams = $this->saveImage($paramsRequest['image']);
            }

           
            $graduateImgParams['graduate_id'] = $graduate->id;
            $graduateImgParams['is_header'] = 0;

            $graduateImg = array_merge($graduateImgParams,  $fileParams);
        


            $this->graduateImageRepository->update($img, $graduateImg);
                

            return redirect()->route('admin.graduateQuality.images', $graduate->id)->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
        } catch (\Exception $th) {
            dd($th);
            return redirect()->route('admin.graduateQuality.images',$graduate->id)->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'No hemos podido encontrar esta publicación.']);
        }

    }

    public function create_image($graduate_id){
        try {
            $item = $this->graduatesRepository->getById($graduate_id);

            return view('admin.pages.graduatesQuality.create_image', compact('item'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store_image(StoreRequestImage $request, $graduate_id){
        try {
            DB::beginTransaction();
            $graduateQuality = $this->graduatesRepository->getById($graduate_id);
            
            $paramsRequest = $request->all();

             //dd($paramsRequest);

            // $paramsRequest =  $request->all();

             if (!($request->file('image') == null)) {
                 /** Saving Photo */
                 $fileParams = $this->saveImage($paramsRequest['image']);
                 
             }
 
            
             $graduateImageParams['graduate_id'] = $graduateQuality->id;
             $graduateImageParams['is_header'] = 1;
 
             $graduateImage = array_merge($graduateImageParams,  $fileParams);
         
 
 
             $this->graduateImageRepository->create($graduateImage);



            DB::commit();

            return redirect()->route('admin.graduateQuality.images', $graduateQuality->id)->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha registrado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
        }


    }
    
    public function destroy_image($graduate_id, $img_id)
    {
        try {
            $graduate = $this->graduatesRepository->getById($graduate_id);
            $img = $this->graduateImageRepository->getById($img_id);
            //dd($img);


            DB::beginTransaction();

            $this->graduateImageRepository->delete($img);

            DB::commit();

            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
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
            $params = $request->all();
            if (!($request->file('imagen') == null)) {
                $paramsImagen = $request->only(['imagen']);
            }
            $graduate = $this->graduatesRepository->getById($id);
            $this->graduatesRepository->update($graduate, $request->all());
                $imageHeader = $graduate->imageHeader();
               
                $videoParams2 = $request->only(['video']);
                $video = substr($videoParams2['video'], -11);
                if($graduate->getCountVideo()>0 && !(is_null($graduate->videoHeader())) ) {
                    if(!is_null($videoParams2['video'])){
                        if(strtoupper($videoParams2['video'])!="NO"  ){
                            $graduateVideo = $this->graduateVideoRepository->getByAttribute("graduate_id", $graduate->id);
                              $videoParams2['graduate_id'] = $graduate->id;
                              $videoParams2['asset_url'] = $video;
                              $videoParams2['is_header'] = 1;
                              unset($videoParams2['video']);
                              //dd($postVideo);
                              $this->graduateVideoRepository->update($graduateVideo, $videoParams2);
                        }
                    }
                 }else{
                    if(!is_null($videoParams2['video'])){

                        if(strtoupper($videoParams2['video'])!="NO"){
                           // dd("Probando NO");
                            $videoParams2['graduate_id'] = $graduate->id;
                        $videoParams2['asset_url'] = $video;
                        $videoParams2['is_header'] = 1;
                        unset($videoParams2['video']);
    
                        $this->graduateVideoRepository->create($videoParams2);
                        }
                    }
                    }
                if (!($request->file('imagen') == null)) {
                    /** Saving Photo */
                    $fileParams = $this->saveImage($paramsImagen['imagen']);
                }
                $graduateImage = $this->graduateImageRepository->getByAttribute("graduate_id", $graduate->id);
                if(is_null($graduateImage)){
                    if (!($request->file('imagen') == null)) {
                        $graduateImgParams['graduate_id'] = $graduate->id;
                        $graduateImgParams['is_header'] = 1;
                        $graduateImg = array_merge($graduateImgParams,  $fileParams);
                        $this->graduateImageRepository->create($graduateImg);
                    }
                }else{
                    if (!($request->file('imagen') == null)) {
                        $graduateImgParams['graduate_id'] = $graduate->id;
                        $graduateImgParams['is_header'] = 1;
                        $graduateImg = array_merge($graduateImgParams,  $fileParams);
                      $this->graduateImageRepository->update($graduateImage, $graduateImg);
                    }
                }
                if($graduate->getCountVideo()>0 && !(is_null($graduate->videoHeader()))) {
                    $videoHeader = $graduate->videoHeader();
                    $this->graduateVideoRepository->delete($videoHeader);
                }
                if (!($request->file('imagen') == null)) {
                    /** Saving Photo */
                    $fileParams = $this->saveImage($paramsImagen['imagen']);
                }
                $graduateImage = $this->graduateImageRepository->getByAttribute("graduate_id", $graduate->id);
                if($graduate->getCountimage()>0&& !(is_null($graduate->imageHeader())) ) {
                    if (!($request->file('imagen') == null)) {
                        $graduateImgParams['graduate_id'] = $graduate->id;
                        $graduateImgParams['is_header'] = 1;
                        $graduateImg = array_merge($graduateImgParams,  $fileParams);
                        $this->graduateImageRepository->update($graduateImage, $graduateImg);
                    }
                }else{
                    if (!($request->file('imagen') == null)) {
                        $graduateImgParams['graduate_id'] = $graduate->id;
                        $graduateImgParams['is_header'] = 1;
                        $graduateImg = array_merge($graduateImgParams,  $fileParams);
                        $this->graduateImageRepository->create($graduateImg);
                    }
                }
                $videoParams = $request->only(['video']);
                $video = substr($videoParams['video'], -11);
                if($graduate->getCountVideo()>0&& !(is_null($graduate->videoHeader())) ) {
                    if(!is_null($videoParams['video'])){
                        if(strtoupper($videoParams['video'])=="NO"){
                                $videoHeader = $graduate->videoHeader();
                                  $this->graduateVideoRepository->delete($videoHeader);
                        }else{
                            $graduateVideo = $this->graduateVideoRepository->getByAttribute("graduate_id", $graduate->id);
                              $videoParams['graduate_id'] = $graduate->id;
                              $videoParams['asset_url'] = $video;
                              $videoParams['is_header'] = 1;
                              unset($videoParams['video']);
                              $this->graduateVideoRepository->update($graduateVideo, $videoParams);
                        }
                    }
                 }else{
                    if(!is_null($videoParams['video'])){
                        if(strtoupper($videoParams['video'])!="NO"){
                        $videoParams['graduate_id'] = $graduate->id;
                        $videoParams['asset_url'] = $video;
                        $videoParams['is_header'] = 1;
                        unset($videoParams['video']);
                        $this->graduateVideoRepository->create($videoParams);
                        }
                    }
                    }
                
            return redirect()->route('admin.graduateQuality.index')->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha actualizado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();

            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido registrar correctamente.', 'icon' => 'error']);
        }
    }


   


     /**
     * @param StoreRequest $request
     * @param array $params
     */
    public function saveImage($file): array
    {
        //  $file = $request->file('image');

        $params = [];

        $fileName = time()  . '_graduate_image.' . $file->getClientOriginalExtension();

        $this->graduateImageRepository->saveImage(File::get($file), $fileName);

        $params['asset_url'] =  'storage/images/graduates/';
        $params['asset'] = $fileName;

        return $params;
    }

    /**
     * @param StoreRequest $request
     * @param array $params
     */
    public function saveImageMultiple($file, $iter): array
    {
        //  $file = $request->file('image');

        $params = [];

        $fileName = time() . $iter . '_graduate_image.' . $file->getClientOriginalExtension();

        $this->graduateImageRepository->saveImage(File::get($file), $fileName);

        $params['asset_url'] =  'storage/images/graduates/';
        $params['asset'] = $fileName;

        return $params;
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