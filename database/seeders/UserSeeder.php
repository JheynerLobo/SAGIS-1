<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\UserRepository;
use App\Repositories\PersonRepository;
use App\Repositories\RoleRepository;

class UserSeeder extends Seeder
{
    /** @var UserRepository */
    protected $userRepository;

    /** @var PersonRepository */
    protected $personRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    public function __construct(
        UserRepository $userRepository,
        PersonRepository $personRepository,
        RoleRepository $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->personRepository = $personRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->roleRepository->all();

        $this->personRepository->all()->map(function ($person, $key) use ($roles) {
            $user = $this->userRepository->getByAttribute('person_id', $person->id);
            if ($key == 0) {

                /** @var \Spatie\Permission\Models\Role */
                $roleAdmin = $roles->where('name', 'admin')->first();

                /** Creating Admin */
                $this->userRepository->createFactory(1, [
                    'person_id' => $person->id
                ]);

                $user->roles()->attach($roleAdmin->id);

                // $admin->roles
            } else {

                /** @var \Spatie\Permission\Models\Role */
                $roleGraduate = $roles->where('name', 'graduate')->first();

                /** Creating Graduates */
                $user = $this->userRepository->createFactory(1, [
                    'person_id' => $person->id
                ]);

                $user->roles()->attach($roleGraduate);
            }
        });
    }
}
