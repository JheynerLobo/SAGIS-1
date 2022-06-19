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
                'name' => 'Administrador',
                'description' => 'Administrador del Sistema'
            ],

            [
                'name' => 'Graduado',
                'description' => 'Estudiante Graduado'
            ],
        ];

        foreach ($roles as $role) {
            $this->roleRepository->create($role);
        }

    }
}
