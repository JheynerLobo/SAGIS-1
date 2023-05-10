<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Person;
use App\Models\PersonAcademic;
use App\Models\Program;

use Maatwebsite\Excel\Concerns\ToModel;

 use Maatwebsite\Excel\Concerns\WithHeadingRow;  


class PeopleImport implements ToModel, WithHeadingRow
{

 
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $validarCorreoInsti = User::get()->where('email', $row['correo_institucional'])->first();
        $validarCorreoPersonal = User::get()->where('email', $row['correo'])->first();

       // dd($validar1);

      // dd($row['correo_institucional']);



       if(is_null($validarCorreoInsti)&&is_null($validarCorreoPersonal)){

        if(!is_null($row['correo'])&&!is_null($row['correo_institucional'])){

            $idPerson = Person::updateOrCreate([ 
                'name' => $row['nombre'], 
                'lastname' =>$row['apellidos'],
                'document_type_id' => 1,
                'document' =>$row['cc'],
                'phone' => $row['celular'],
                'address' => "N/N",
                'telephone' => "N/N",
                'email' =>$row['correo'],
                'birthdate_place_id' => 1,
                'birthdate' => "1985-05-10",     
        
            ]);
    
            $idUser = User::updateOrCreate([
                'person_id'=> $idPerson->id,
                'code' =>  "N/N",
                'email' => $row['correo_institucional'],
                'password' => "password"
            ]);
    
             /** Searching User */
                $user = User::get()->where('email', $row['correo_institucional'])->first();
                $user->roles()->sync(2);



                     /** Searching Program */
                     $program = Program::get()->where('id', 1)->first();


                    $idPersonAcademic = PersonAcademic::updateOrCreate(
                        [
                            'person_id' => $idPerson->id,
                             'program_id' => $program->id,
                             'year' => 1990

                        ]
                        );

        }else if(is_null($row['correo_institucional'])){
            $idPerson = Person::updateOrCreate([ 
                'name' => $row['nombre'], 
                'lastname' =>$row['apellidos'],
                'document_type_id' => 1,
                'document' =>$row['cc'],
                'phone' => $row['celular'],
                'address' => "N/N",
                'telephone' => "N/N",
                'email' =>$row['correo'],
                'birthdate_place_id' => 1,
                'birthdate' => "1985-05-10",     
        
            ]);
    
            $idUser = User::updateOrCreate([
                'person_id'=> $idPerson->id,
                'code' =>  "N/N",
                'email' => $row['correo'],
                'password' => "password"
            ]);
    
             /** Searching User */
                $user = User::get()->where('email', $row['correo'])->first();
                $user->roles()->sync(2);

                   /** Searching Program */
                   $program = Program::get()->where('id', 1)->first();


                   $idPersonAcademic = PersonAcademic::updateOrCreate(
                       [
                           'person_id' => $idPerson->id,
                            'program_id' => $program->id,
                            'year' => 1990

                       ]
                       );



        }else if(is_null($row['correo'])){

            $idPerson = Person::updateOrCreate([ 
                'name' => $row['nombre'], 
                'lastname' =>$row['apellidos'],
                'document_type_id' => 1,
                'document' =>$row['cc'],
                'phone' => $row['celular'],
                'address' => "N/N",
                'telephone' => "N/N",
                'email' =>$row['correo_institucional'],
                'birthdate_place_id' => 1,
                'birthdate' => "1985-05-10",     
        dd(name)
            ]);
    
            $idUser = User::updateOrCreate([
                'person_id'=> $idPerson->id,
                'code' =>  "N/N",
                'email' => $row['correo_institucional'],
                'password' => "password"
            ]);
    
             /** Searching User */
                $user = User::get()->where('email', $row['correo_institucional'])->first();
                $user->roles()->sync(2);


                   /** Searching Program */
                   $program = Program::get()->where('id', 1)->first();


                   $idPersonAcademic = PersonAcademic::updateOrCreate(
                       [
                           'person_id' => $idPerson->id,
                            'program_id' => $program->id,
                            'year' => 1990

                       ]
                       );


        }
       
      

       }

       /* if(is_null($validarCorreoInsti)&&is_null($validarCorreoPersonal)){
        $idPerson = Person::updateOrCreate([ 
            'name' => $row[0], 
            'lastname' =>$row[1],
            'document_type_id' => $row[2],
            'document' =>$row[3],
            'phone' =>$row[4],
            'address' =>$row[5],
            'telephone' =>$row[6],
            'email' =>$row[7],
            'birthdate_place_id' =>$row[8],
            'birthdate' => $row[9],     
    
        ]);

        $idUser = User::updateOrCreate([
            'person_id'=> $idPerson->id,
            'code' => $row[10],
            'email' => $row[11],
            'password' => $row[12],
        ]);

      
            $user = User::get()->where('email', $row[11])->first();
            $user->roles()->sync(2);
      

       } */

      


    }

}
