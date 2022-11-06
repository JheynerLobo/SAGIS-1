<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Mail\MessageReceived;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Repositories\PersonRepository;
use App\Repositories\FacultyRepository;
use App\Repositories\ProgramRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\UniversityRepository;
use App\Repositories\DocumentTypeRepository;
use App\Http\Requests\Graduates\StoreRequest;
use App\Http\Requests\Graduates\UpdateRequest;
use App\Repositories\PersonAcademicRepository;
use App\Http\Requests\Graduates\StoreAcademicRequest;
use App\Http\Requests\Graduates\UpdateAcademicRequest;
use App\Http\Requests\Graduates\UpdatePasswordRequest;

class GraduateController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /** @var PersonRepository */
    protected $personRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    /** @var DocumentTypeRepository */
    protected $documentTypeRepository;

    /** @var CityRepository */
    protected $cityRepository;

        /** @var StateRepository */
        protected $stateRepository;

      /** @var CountryRepository */
      protected $countryRepository;

     /** @var PersonAcademicRepository */
     protected $personAcademicRepository;

       /** @var ProgramRepository */
       protected $programRepository;

        /** @var UniversityRepository */
        protected $universityRepository;

        
        /** @var FacultyRepository */
        protected $facultyRepository;

    /** @var \Spatie\Permission\Models\Role */
    protected $role;

    public function __construct(
        UserRepository $userRepository,
        PersonRepository $personRepository,
        RoleRepository $roleRepository,
        DocumentTypeRepository $documentTypeRepository,
        CountryRepository $countryRepository,
        StateRepository $stateRepository,
        CityRepository $cityRepository,
        ProgramRepository $programRepository,
        PersonAcademicRepository $personAcademicRepository, 
        UniversityRepository $universityRepository,
        FacultyRepository $facultyRepository

    ) {
        $this->middleware('auth:admin');

        $this->userRepository = $userRepository;
        $this->personRepository = $personRepository;
        $this->roleRepository = $roleRepository;
        $this->documentTypeRepository = $documentTypeRepository;
        $this->countryRepository = $countryRepository;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->programRepository = $programRepository;
        $this->personAcademicRepository = $personAcademicRepository;
        $this->universityRepository = $universityRepository;
        $this->facultyRepository =  $facultyRepository;

        $this->role = $this->roleRepository->getByAttribute('name', 'graduate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $items = $this->userRepository->getByRole($this->role->name);

            return view('admin.pages.graduates.index', compact('items'));
        } catch (\Throwable $th) {
            //throw $th;
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
            $documentTypes = $this->documentTypeRepository->all();
            $cities = $this->cityRepository->allOrderBy('countries.id');
           // $programs = $this->progmamRepository->getByAttribute('level_id', 1);

            // return $cities;

            return view('admin.pages.graduates.create', compact('documentTypes', 'cities'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function create_academic($id)
    {
        try {
          
                $item = $this->personRepository->getById($id);

                //dd($item );
    
                $users = $this->userRepository->getByRole($this->role->name);
                
    
                //$documentTypes = $this->documentTypeRepository->all();
                $cities = $this->cityRepository->allOrderBy('countries.id');
    
               // $academics_full = $this->personAcademicRepository->getUni();
    
                 //dd($academics_full);
    
                 //$data_academic = $this->personAcademicRepository->getById($id_academic);
    
                 //$programs_full = $this->personAcademicRepository->getProgramas();
                 $academic_levels =  $this->personAcademicRepository->getNiveles();

                 //dd($academic_levels);
    
                 //dd($academic_levels);
    
                 //dd($data_academic->program->academicLevel->name);
                $academics = $item->personAcademic;
    
               // $laborales = $item->personCompany;
               //dd($id_academic);
    
    
                //return $id;
    
                return view('admin.pages.graduates.create_academic', compact('item',  'cities', 'academics',  'users', 'academic_levels'));
        } catch (\Throwable $th) {
            throw $th;
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

            DB::beginTransaction();

           // dd($request->file('image'));
        
            if(!($request->file('image') == null)) {
                         /** Saving Photo */
                         $fileParams = $this->saveImage($request);
            }
   

            /** Creating Person */
            $personParams = $request->except(['code', 'company_email', 'image', '_token']);
            //$personParams = array_merge($personParams, $fileParams);

            if(!($request->file('image') == null)) {
                $personParams = array_merge($personParams,  $fileParams);
            }else{
                $personParams = array_merge($personParams);
            }
           

            $this->personRepository->create($personParams);

            /** Searching created Person */
            $person = $this->personRepository->getByAttribute('email', $request->email);

            /** Creating User */
            $userParams = $request->only(['code', 'company_email']);

            $userParams['email'] = $userParams['company_email'];
            $userParams['person_id'] = $person->id;
            $userParams['password'] = 'password';
      

            unset($userParams['company_email']);

            $this->userRepository->create($userParams);

            /**Creating PersonAcademic */
            $personAcademicParams = $request->only( ['person_id', 'program_id', 'year']);
            $personAcademicParams['person_id'] = $person->id;

           // $pregrade = $this->programRepository->getByAttribute('level_id', 1);
           // $programs = $this->progmamRepository->getByAttribute('name', "Programa de Ingeniería de Sistema");
           $programs = $this->programRepository->first()->id;

           // dd($programs);
            $personAcademicParams['program_id'] = $programs;
            $personAcademicParams['year'] = 2000;

            $this->personAcademicRepository->create($personAcademicParams);


            /** Searching User */
            $user = $this->userRepository->getByAttribute('email', $userParams['email']);
            
            //$user->roles()->attach($this->role);
            $user->roles()->sync($this->role);

            Mail::to($person->email)->queue(new MessageReceived($person, $userParams));

            DB::commit();
            return redirect()->route('admin.graduates.index')->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha registrado correctamente.']);
        } catch (\Exception $th) {
            DB::rollBack();
            dd($th);
            return back()->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'Se ha registrado correctamente.']);
        }
    }


    public function store_academic(StoreAcademicRequest $request, $id)
    {
        try {

            DB::beginTransaction();


                $data = $request->all();

                $city_id = 0;
                if($data['university_place_id']== "-2"){
                    /* Pais */
                    $countryParams = $request->only('country_name');
                    $countryParams['name'] = $countryParams['country_name'];
                    unset($countryParams['country_name']);

                    $countryParams['slug'] = strtoupper(substr($countryParams['name'], 0, 3));


                     /* Con esta consulta se comprueba si el pais que ingreso el usuario existe, si existe devuelve el pais sino NULL */
                    $country= $this->countryRepository->getPais($countryParams['name']);
                    /* Si es NULL crea el PAIS  */
                    if(is_null($country))  $this->countryRepository->create($countryParams);




                    /* Estado/Departamento */
                    $stateParams = $request->only('state_name');
                    $country_id = $this->countryRepository->getPaisID($countryParams['name']);

                    $stateParams['name'] = $stateParams['state_name'];
                    unset($stateParams['state_name']);

                    $stateParams['slug'] = strtoupper(substr($stateParams['name'], 0, 3));

                    $stateParams['country_id'] = $country_id;

                     /* Con esta consulta se comprueba si el estado que ingreso el usuario existe, si existe devuelve el estado sino NULL */
                     $state= $this->stateRepository->getEstado($stateParams['name']);

                    //dd($state);
                    
                     /* Si es NULL crea el ESTADO  */
                     if(is_null($state))  $this->stateRepository->create($stateParams);


                     /* Ciudad */
                     $cityParams = $request->only('city_name');
                     $state_id= $this->stateRepository->getStateID($stateParams['name']);
   
                     $cityParams['name'] = $cityParams['city_name'];
                     unset($cityParams['city_name']);

                     $cityParams['slug'] = strtoupper(substr($cityParams['name'], 0, 3));

                     $cityParams['state_id'] = $state_id;

                      /* Con esta consulta se comprueba si la ciudad que ingreso el usuario existe, si existe devuelve la ciudad sino NULL */
                      $city= $this->cityRepository->getCity($cityParams['name']);
                    
                      /* Si es NULL crea la CIUDAD  */
                      if(is_null($city))  $this->cityRepository->create($cityParams);  


                      $city_id = $this->cityRepository->getCityID($cityParams['name']);
                    
                }else{
                    $city_id = (int)$data['university_place_id'];
                }

                /* Universidad */

                $universityParams = $request->only('university_name', 'address');
                $universityParams['name'] = $universityParams['university_name'];
                unset($universityParams['university_name']);

                $universityParams['city_id'] = $city_id;

                 /* Con esta consulta se comprueba si la universidad que ingreso el usuario existe, si existe devuelve la universidad sino NULL */
                 $university= $this->universityRepository->getUniversity($universityParams['name']);
                    
                 /* Si es NULL crea la UNIVERSIDAD  */
                 if(is_null($university))  $this->universityRepository->create($universityParams);

                 /* Facultad */
                 $facultyParams = $request->only('faculty_name');
                 $university_id = $this->universityRepository->getUniversityID($universityParams['name']);

                 $facultyParams['name'] = $facultyParams['faculty_name'];
                 unset($facultyParams['faculty_name']);

                 $facultyParams['university_id'] = $university_id;

                  /* Con esta consulta se comprueba si la facultad que ingreso el usuario existe, si existe devuelve la facultad sino NULL */
                /*   $faculty= $this->facultyRepository->getModelName($facultyParams['name']); */
                    
                  /* Si es NULL crea la FACULTAD  */
                  /* if(is_null($faculty))   */
                  $this->facultyRepository->create($facultyParams);

                  /* Problema viene de aca */
                $faculty_id = $this->facultyRepository->getModelID($facultyParams['name']);
                //dd($faculty_id );

                $program_params = $request->only('program_name', 'academic_level_id');
                $program_params['name'] = $program_params['program_name'];
                unset($program_params['program_name']);
                $program_params['academic_level_id'] = (int)$program_params['academic_level_id'];
                $program_params['faculty_id'] = $faculty_id;

                  /* Con esta consulta se comprueba si el programa que ingreso el usuario existe, si existe devuelve el programa sino NULL */
                /*   $program= $this->programRepository->getModelName($program_params['name']);
 */
                  //dd($program);
                    
                  /* Si es NULL crea el PROGRAMA  */
                /*   if(is_null($program))   */
                  
                  $this->programRepository->create($program_params);

                  $personAcademic_params = $request->only('year');
                  $program_id = $this->programRepository->getModelID($program_params['name']);
                  $personAcademic_params['program_id'] = $program_id ;
                  $personAcademic_params['person_id'] = (int)$id;


                  $this->personAcademicRepository->create( $personAcademic_params);
            DB::commit();
            return redirect()->route('admin.graduates.show', $id)->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha registrado correctamente.']);
        } catch (\Exception $th) {
            DB::rollBack();
            dd($th);
            return back()->with('alert', ['title' => '¡Error!', 'icon' => 'error', 'message' => 'Se ha registrado correctamente.']);
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
        try {
            $item = $this->personRepository->getById($id);

            $academics = $item->personAcademic;

            $laborales = $item->personCompany;

            return view('admin.pages.graduates.show', compact('item', 'academics', 'laborales'));
        } catch (\Exception $th) {
            throw $th->getMessage();
        }
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
            $item = $this->personRepository->getById($id);

            $documentTypes = $this->documentTypeRepository->all();
            $cities = $this->cityRepository->allOrderBy('countries.id');

            $academics = $item->personAcademic;

            $laborales = $item->personCompany;

            return view('admin.pages.graduates.edit', compact('item', 'documentTypes', 'cities', 'academics', 'laborales'));
        } catch (\Exception $th) {
            throw $th->getMessage();
        }
    }

    /**
     * Show the form for editing the Graduate's password.
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit_password($id)
    {
        try {
            $item = $this->personRepository->getById($id);

            return view('admin.pages.graduates.edit_password', compact('item'));
        } catch (\Exception $th) {
            //throw $th;
        }
    }



    public function edit_academic($id, $id_academic)
    {
        try {
            $item = $this->personRepository->getById($id);

            $users = $this->userRepository->getByRole($this->role->name);
            

            $documentTypes = $this->documentTypeRepository->all();
            $cities = $this->cityRepository->allOrderBy('countries.id');

            $academics_full = $this->personAcademicRepository->getUni();

             //dd($academics_full);

             $data_academic = $this->personAcademicRepository->getById($id_academic);

             $programs_full = $this->personAcademicRepository->getProgramas();
             $academic_levels =  $this->personAcademicRepository->getNiveles();

             //dd($academic_levels);

             //dd($data_academic->program->academicLevel->name);
            $academics = $item->personAcademic;

            $laborales = $item->personCompany;
           //dd($id_academic);


            //return $id;

            return view('admin.pages.graduates.edit_academic', compact('item', 'documentTypes', 'cities', 'academics', 'laborales', 'users', 'academics_full', 'data_academic', 'programs_full', 'academic_levels'));
        } catch (\Exception $th) {
            throw $th->getMessage();
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
            //$data = $request->all();

            $personParams = $request->only(['name', 'lastname', 'document_type_id', 'document', 'phone', 'telephone', 'email',
            'birthdate', 'birthdate_place_id']);

            //dd($data );
            $userParams = $request->only(['code', 'company_email']);
            $userParams['email'] = $userParams['company_email'];

            unset($userParams['company_email']);

           //   dd($userParams );

          
            
            //$person = $this->personRepository->getByAttribute('email', $request->email);
            $person = $this->personRepository->getById($id);

             /** Searching User */
             //$user = $this->userRepository->getByAttribute('email', $userParams['email']);
            $user = $this->userRepository->getByAttribute('person_id',$person->id);
            // $user = $this->userRepository->getById($person->id);

            $this->personRepository->update($person, $personParams);

            $this->userRepository->update($user, $userParams);

            
           // DB::beginTransaction();

          //  DB::commit();

            return redirect()->route('admin.graduates.index')->with('alert', ['title' => '¡Éxito!', 'icon' => 'success', 'message' => 'Se ha actualizado correctamente.']);
        } catch (\Exception $th) {
           // DB::rollBack();
            return redirect()->route('admin.home')->with('alert', ['title' => __('messages.error'), 'icon' => 'error', 'text' => $th->getMessage()]);
        }
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update_password(UpdatePasswordRequest $request, $id)
    {
        try {
            $params = $request->all();

          //  dd($params);
          $item = $this->personRepository->getById($id);

          //dd($item->user);
           // $item = $this->userRepository->getById($id);
            //dd($item);

            $this->userRepository->update($item->user, $params);

            return  redirect()->route('admin.graduates.index')->with('alert', [
                'title' => '¡Éxito!',
                'icon' => 'success',
                'message' => 'Se ha actualizado correctamente la contraseña'
            ]);
        } catch (\Exception $th) {
            dd($th);
            return back()->with('alert', [
                'title' => '¡Error!',
                'icon' => 'error',
                'message' => 'No se ha podido actualizar correctamente la contraseña'
            ]);
        }
    }


    public function update_academic(UpdateAcademicRequest $request, $id, $id_academic)
    {
        try {


            $params_person_academic = $request->all();

        
             

           $data_academic = $this->personAcademicRepository->getById($id_academic);

             //dd($data_academic);
             $program = $this->programRepository->getById($data_academic->program_id);
            
             //dd($params_person_academic);
             $program_params = $request->only(['program_name', 'academic_level_id']);

             $program_params['name'] = $program_params['program_name'];

            unset($program_params['program_name']);


             $program_params['academic_level_id'] = (int) $program_params['academic_level_id'];

           

            $university_params =$request->only(['university_name']);
            $university_params['name'] = $university_params['university_name'];

            unset($university_params['university_name']);

            $faculty_params =$request->only(['faculty_name']);
            $faculty_params['name'] = $faculty_params['faculty_name'];
            unset($faculty_params['faculty_name']);


            $this->programRepository->update($program, $program_params);
            $this->facultyRepository->update($program->faculty, $faculty_params);
            $this->universityRepository->update($program->faculty->university,$university_params);
            $this->personAcademicRepository->update($data_academic, $params_person_academic);

             

            return  redirect()->route('admin.graduates.show', $id)->with('alert', [
                'title' => '¡Éxito!',
                'icon' => 'success',
                'message' => 'Se ha actualizado correctamente los datos academicos.'
            ]);
        } catch (\Exception $th) {
            dd($th);
            return back()->with('alert', [
                'title' => '¡Error!',
                'icon' => 'error',
                'message' => 'No se ha podido actualizar correctamente los datos academicos.'
            ]);
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
            $graduate = $this->userRepository->getById($id);

            $person = $this->personRepository->getById($graduate->person_id);
            
            

            DB::beginTransaction();

            $this->personRepository->delete($person);

           DB::commit();
            
           
            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }

    }

    public function destroy_academic($id, $id_academic)
    {
        try {

            

            $personAcademic = $this->personAcademicRepository->getById($id_academic);
            $program = $this->programRepository->getById($personAcademic->program_id);
            $faculty = $this->facultyRepository->getById($program->faculty_id);
           /*  $university =$this->universityRepository->getById($faculty->university_id ); */


        
         /*    $graduate = $this->userRepository->getById($id);

            $person = $this->personRepository->getById($graduate->person_id); */
            
            //dd($faculty);
            

            DB::beginTransaction();

             $this->personAcademicRepository->delete($personAcademic);
             $this->programRepository->delete($program);
             $this->facultyRepository->delete($faculty);
             /* $this->universityRepository->delete($university); */

           DB::commit();
            
           
            return back()->with('alert', ['title' => '¡Éxito!', 'message' => 'Se ha eliminado correctamente.', 'icon' => 'success']);
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return back()->with('alert', ['title' => '¡Error!', 'message' => 'No se ha podido eliminar correctamente.', 'icon' => 'error']);
        }

    }

    /**
     * @param StoreRequest $request
     * @param array $params
     */
    public function saveImage($request): array
    {
        $file = $request->file('image');

        $params = [];

        $fileName = time() . '_people_image.' . $file->getClientOriginalExtension();

        $this->personRepository->saveImage(File::get($file), $fileName);

        $params['image_url'] =  'storage/images/people/';
        $params['image'] = $fileName;

        return $params;

    } 
}