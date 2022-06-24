<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\ProfileUpdateRequest;

use App\Repositories\UserRepository;

class UserController extends Controller
{
    /** @var UserRepository */
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->middleware('auth:web');

        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        try {
            $user = $this->userRepository->getById(Auth::guard('web')->user()->id);

            return view('pages.profile');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(ProfileUpdateRequest $request)
    {
        try {
            $user = $this->userRepository->getById(Auth::guard('web')->user()->id);

            $this->userRepository->update($user, $request->all());

            return back()->with('alert_message', ['title' => '¡Éxito!', 'icon' => 'success', 'text' => 'Se ha actualizdo correctamente su información.']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update_password()
    {
        # code...
    }
}
