<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\Admin;
use App\Models\State;
use App\Models\Person;
use App\Models\Country;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;



class LoginTest extends TestCase
{

    // use WithoutMiddleware;

   
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_validar_carga_formulario_login()
    {
        Artisan::call('migrate');

        /* El formulario carga */
        $carga = $this->get(route('admin.login'));
        $carga->assertStatus(200)->assertSee('Inicio de Sesión');
          
    }

    public function test_validar_credenciales_erroneas_login(){

        $this->withoutMiddleware();
        
        Artisan::call('migrate');

        //Cargar documento
        $document = DocumentType::create(
            [
                'name' => "Document One Test",
                'description' => "Document One Desc",
                'slug' => "DO",
            ]
        );

        //Cargar pais
        $country = Country::create([
            'name' => "Pais Test",
            'slug' => "COTest",
        ]);


        //Cargar Estado
        $state = State::create([
            'country_id' => $country->id, 
            'name'=>"Norte de Santander Test", 
            'slug' =>"N/STest"
        ]);

        //Cargar ciudad
        $city = City::create([
            'state_id' => $state->id, 
            'name' => "CúcutaTest", 
            'slug' => "cuctest",

        ]);

        //Cargar persona
        $person = Person::create([

            'name' => "Luca Test",
            'lastname' => "Suarez",
            'document' => '109064445' ,
            'phone' => "544544",
            'address' => "Calle #84-51 Caobos",
            'telephone' => "3154544",
            'email' => "lucastest@gmail.com",
            'birthdate' => "2000-05-14",
            'document_type_id' => $document->id,
            'birthdate_place_id' => $city->id,

        ]);



           Admin::create([
            'person_id' => $person->id,
            'email' => "lucastest@ufps.edu.co",
             'password' => Hash::make('password') , 
            //'password' => 'password' ,

        ]);

         //Error en credenciales
         $credencialesMal = $this->post(route('admin.login'), [
            'email' => "lus@ufps.edu.co",
            'password' => "hola"
        ]);

        $credencialesMal->assertStatus(302);

       
    }

    public function test_validar_acceso_noAutorizado(){
        Artisan::call('migrate');
        $accesoMal = $this->get(route('admin.home'));
        $accesoMal->assertStatus(302)->assertRedirect(route('admin.login'));
    }

}

