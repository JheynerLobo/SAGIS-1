<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\UserRepository;
use App\Repositories\PersonRepository;
// use App\Repositories\RoleRepository;

class UserSeeder extends Seeder
{
    /** @var UserRepository */
    protected $userRepository;

    /** @var PersonRepository */
    protected $personRepository;

    // /** @var RoleRepository */
    // protected $roleRepository;

    public function __construct(
        UserRepository $userRepository,
        PersonRepository $personRepository
        // RoleRepository $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->personRepository = $personRepository;
        // $this->roleRepository = $roleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = 0;

        $this->personRepository->all()->map(function ($person, $key) {
            if ($key == 0) {

                /** Creating Admin */
                $this->userRepository->createFactory(1, [
                    'person_id' => $person->id
                ]);
                // $admin = $this->userRepository->getByAttribute('person_id', $person->id);

                // $admin->roles()->attach(1);

                // $admin->roles
            } else {

                /** Creating Graduates */
                $user = $this->userRepository->createFactory(1, [
                    'person_id' => $person->id
                ]);

                // $user = $this->userRepository->getByAttribute('person_id', $person->id);

                // $user->roles()->attach(2);
            }
        });
    }
}
