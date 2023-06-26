<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\RoleRepository;
use Exception;

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
                'name' => 'superadmin',
                'fullname' => 'Administrador del Sistema',
                'guard_name' => 'admin'
            ],

            [
                'name' => 'graduate',
                'fullname' => 'Estudiante Graduado'
            ]
        ];

        try {
            foreach ($roles as $role) {
                $this->roleRepository->create($role);
            }
        } catch (Exception $th) {
            print($th->getMessage());
        }
    }
}
