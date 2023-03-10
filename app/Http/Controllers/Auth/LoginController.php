<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function dologin(Request $request)
    {
        $input = $request->all();

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(auth()->attempt($credentials))
        {
            $user = auth()->user()->toArray();
            // echo json_encode(auth()->user()->toArray()['type']);die(0);
            if ($user['type'] == 'admin') {
                echo json_encode(
                    array(
                        'status' => true,
                        'message' => 'login success',
                        'type' => $user['type'],
                        'link' => 'biodataList'
                    )
                );
            }else{
                echo json_encode(
                    array(
                        'status' => true,
                        'message' => 'login success',
                        'type' => $user['type'],
                        'link' => 'home'
                    )
                );
            }
        }else{
            echo json_encode(
                array(
                    'status' => false,
                    'message' => 'invalid email or password'
                )
            );
        }

    }

    public function logout() {
        Session::flush();
        auth()->logout();
        return redirect(request()->getSchemeAndHttpHost().'/login');
    }
}
