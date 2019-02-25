<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use App\Usuarios_inactivos;

class LoginController extends Controller {
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

    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {

        
        $user = Socialite::driver($provider)->stateless()->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->user();
   
//        $user->token;
        
        $userActive = User::where('provider_id',$user->id)->first(); // comprobar si existe el usuario y está activo

        $userInactive = Usuarios_inactivos::where('provider_id',$user->id)->first(); // No estaría activo

        if ($userActive) {

           Auth::login($userActive, TRUE);

            return redirect()->route('home');
                        
        } else if(!$userActive && $userInactive) {
            
  
            return redirect()->route('login')->with(['message' => 'Usuario inactivo']);
            
        }else{
            
             Usuarios_inactivos::create([
                
                'name' => $user->name,
                'email' => $user->email,
                'provider' => strtoupper($provider),
                'provider_id' => $user->id
            ]);
            
            
           return redirect()->route('home')->with(['message' => 'Usuario pendiente de activacion']);

        }

    }
    
}
