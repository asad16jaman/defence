<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    //

    public function register(){
        return view('auth.register');
    }

    function store(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|unique:users',
            'password' => "required|confirmed|min:2"
        ]);

        $newUser = User::create($request->all());
        Profile::create(['user_id'=>$newUser->id]);
        return redirect()->route('login')->with('success','successfully registered now you can login');
    }

    function login(){
        return view('auth.login');
    }

    function authenticate(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remembar?true:false)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error','credintial not match');
       
    }

    function sendEmailForResetPassword(Request $request) {
        $request->validate(['email' => 'required|email']);
     
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    function resetPasswordForm(string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }
    function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);


        // return response()->json($request->all());
        

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }

    function sndMailForEmailVarification(){
        $user = Auth::user();
        event(new Registered($user));
        return to_route('verification.notice');
    }

    function emailVarification(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    }




    public function logout(Request $request){
        Auth::logout();
 
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return back();
    }

    //end of function
}
