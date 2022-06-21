<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\RoleRepository;

class RoleSeeder extends Seeder
{

    /** @var RoleRepository */
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'fullname' => 'Administrador del Sistema'
            ],

            [
                'name' => 'graduate',
                'fullname' => 'Estudiante Graduado'
            ],
        ];

        foreach ($roles as $role) {
            $this->roleRepository->create($role);
        }

    }
}
