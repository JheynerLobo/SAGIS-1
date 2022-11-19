<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;



class ExampleTest extends TestCase
{
    //use RefreshDatabase;


    /** @test */
    public function test_example()
    {
       // DocumentType::factory()->create();
         //Person::factory()->create();

         /* $person = Person::factory()->create(
            [
                'name' => 'Jarlin Test',
                'lastname' => 'Fonseca',
                'email' => 'jarli@gmail.com',
                'document' => '100628747874',
                'document_type_id' => 1,
                'birthdate_place_id' => 1,
            ]);

            //dd($person->id);
       
        $user = User::factory()->create(
            [
                'person_id' => $person->id,
            ]
        ); */

        //dd($user->id);

        

    /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
       /*  $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/admin/graduates/index');
 */
                        // dd($response);

/*         $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/'); */
        // $response = $this->get('/admin/graduates/index');
       // $response->assertStatus(200);
       $this->assertTrue(True);



   


    }

    /* public function testIndexRoleConUsuarioNoAutenticado()
    {
        $this->json('GET', '/role')
            ->assertJson(['Not_authorized'])
            ->assertStatus(401);
    } */
}
