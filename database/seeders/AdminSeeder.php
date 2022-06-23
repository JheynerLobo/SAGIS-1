<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

use App\Repositories\PersonRepository;
use App\Repositories\AdminRepository;
use App\Repositories\RoleRepository;

class AdminSeeder extends Seeder
{
    /** @var PersonRepository */
    protected $personRepository;

    /** @var AdminRepository */
    protected $adminRepository;

    /** @var RoleRepository */
    protected $roleRepository;


    public function __construct(
        PersonRepository $personRepository,
        AdminRepository $adminRepository,
        RoleRepository $roleRepository
    ) {
        $this->personRepository = $personRepository;
        $this->adminRepository = $adminRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $rolesAdmin = $this->roleRepository->all()->where('guard_name', 'admin');
            $jarlinPerson = $this->personRepository->getByAttribute('document', '1006287478');
            $ingSistemas = $this->personRepository->getByAttribute('email', 'judithdelpilarrt@ufps.edu.co');

            /** Creating Admins */
            $this->adminRepository->createFactory(1, [
                'person_id' => $jarlinPerson->id,
                'email' => 'jarlinandresfb@ufps.edu.co'
            ]);

            $this->adminRepository->createFactory(1, [
                'person_id' => $ingSistemas->id,
                'email' => 'ingsistemas@ufps.edu.co',
            ]);

            /** Getting Admins */
            $adminJarlin = $this->adminRepository->getByAttribute('person_id', $jarlinPerson->id);
            $adminSistemas = $this->adminRepository->getByAttribute('person_id', $ingSistemas->id);

            $adminJarlin->roles()->attach($rolesAdmin->random(1)->first());
            $adminSistemas->roles()->attach($rolesAdmin->random(1)->first());
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
