<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function index(){


    return view('Profile/Profile');
    }

public function changepasssword(Request $request) {

$request->validate([
            'current' => 'required',
            'newpass'=>['required','confirmed'],
            ]);

$response = Http::post(env("API_URL").'/api/native-profile',[
            'userid' => session('logged_in_user_id'),
            'current' => $request->current,
            'newpass' => $request->newpass,
            'namconfirme'=> $request->confirm,
        ]);

if ($response->failed()) {
            return back()->withErrors([
                'email' => 'current password doesnot match.',
     ]); 
}


 
return view('Profile/Profile',['saved'=>'saved']);

    
}


}
