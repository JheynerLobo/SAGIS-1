<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Providers\RouteServiceProvider;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

use App\Traits\Auth\Client\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /** @var RoleRepository */
    protected $roleRepository;

    /** @var UserRepository */
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        RoleRepository $roleRepository,
        UserRepository $userRepository
    ) {
        $this->middleware('guest:web')->except('logout');
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $roles = $this->roleRepository->all()->where('guard_name', 'web');
        return view('auth.login', compact('roles'));
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
       // $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        $this->saveRoleSession($request->get('role'));

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            //: redirect()->intended($this->redirectPath());
            : redirect()->route('home');
    }


    /**
     * @param Request $request
     * @param int $role_id
     */
    protected function saveRoleSession($role_id)
    {
        $role = $this->roleRepository->getById($role_id);
        session()->put('role', $role);
    }


    protected function deleteRoleSession()
    {
        session()->forget('role');
    }
    
}
