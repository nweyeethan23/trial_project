<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->email ?? null;
        $password = $request->password ?? null;
        $user = User::where('email', '=', $email)->first();
        if($user){
            if (Hash::check($password, $user->password)) {
                $credentials = $request->only('email', 'password');
                if (\Auth::attempt($credentials)) {
                    return redirect()->route('home');
                }
            }else{
                $errorPassword = "incorrect";
            }
        }else{
            $errorEmail = "invalid";
        }
        
        return back()->with([
            'email' => $errorEmail ?? null,
            'password' => $errorPassword ?? null,
        ]);
    }
}
