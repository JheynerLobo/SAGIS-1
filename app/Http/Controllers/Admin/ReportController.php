<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PersonRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /** @var PersonRepository */
    protected $personRepository;

    /** @var UserRepository */
    protected $userRepository;

    /** @var RoleRepository */
    protected $roleRepository;

    public function __construct(
        PersonRepository $personRepository,
        UserRepository $userRepository,
        RoleRepository $roleRepository
    ) {
        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;

        $this->middleware('auth:admin');
    }

    public function graduates()
    {
        try {
            $graduateRole = $this->roleRepository->getByAttribute('name', 'graduate');
            $items = $graduateRole->users;
            
            return view('admin.pages.reports.graduates', compact('items'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
