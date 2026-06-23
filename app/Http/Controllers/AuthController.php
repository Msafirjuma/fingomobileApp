<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // 1. Show the login window
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Handle the login submission
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hit the remote Laravel Dashboard App API
        $response = Http::post(env("API_URL").'/api/native-login',[
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // If remote login fails
        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'These credentials do not match our remote records.',
            ]);
        }

        
        $userId = $response->json('userid');

        $request->session()->regenerate();

        // 4. Create your normal session data
        $request->session()->put('logged_in_user_id', $userId);
       


        return redirect()->route('desktop.dashboard');
    }

    public function register()  {

    return view('register');
        
    }

    // 3. Handle Logout
    public function logout()
    {
        // Delete local credentials
      session()->forget('logged_in_user_id');

      return redirect('/');
    }

public function registersubmit(Request $request) {

      $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name'=>"required",
        ]);

$response = Http::post(env("API_URL").'/api/native-register',[
            'email' => $request->email,
            'password' => $request->password,
            'name'=> $request->name,
        ]);

 if ($response->failed()) {
            return back()->withErrors([
                'email' => 'Email already exist.',
     ]);   
}

$userId = $response->json('userId');

 $request->session()->put('logged_in_user_id', $userId);

 return redirect()->route('desktop.dashboard');

}

public function no_internetconnection(){


return view('no_internetconnection');
    
}



}