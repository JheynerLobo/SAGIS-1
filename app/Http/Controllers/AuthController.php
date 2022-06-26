<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\ProfileUpdateRequest;

use App\Repositories\UserRepository;

class AuthController extends Controller
{
    /** @var UserRepository */
    protected $userRepository;

    /** @var Auth */
    protected $auth;

    public function __construct(
        UserRepository $userRepository,
        Auth $auth
    ) {
        $this->middleware('auth:web');

        $this->userRepository = $userRepository;

        $this->auth = $auth->guard('web');
    }

    public function profile()
    {
        try {
            $user = $this->userRepository->getById($this->auth->user()->id);

            return view('pages.profile', compact('user'));
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function update(ProfileUpdateRequest $request)
    {
        try {
            $user = $this->userRepository->getById($this->auth->user()->id);

            $this->userRepository->update($user, $request->all());

            return back()->with('alert_message', ['title' => '¡Éxito!', 'icon' => 'success', 'text' => 'Se ha actualizdo correctamente su información.']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update_password()
    {
        try {
            $user = $this->userRepository->getById($this->auth->user()->id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
