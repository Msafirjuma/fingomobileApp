<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()  {


    
    $user = session('logged_in_user_id');

  $response = Http::post(env("API_URL").'/api/native-dashboard',[
            'userId' => session('logged_in_user_id'),
    
        ]);



    return view('Dashboard.Dashboard',['user'=>$user,'goal'=>$response->json('goal'),'group'=>$response->json('group'),'accomp'=>$response->json('accomp')]);
        
    }
}
