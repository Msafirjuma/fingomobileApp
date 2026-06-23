<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GoalsController extends Controller
{
    public function index(){

    $response = Http::post(env("API_URL").'/api/native-viewgoal',[
            'userId' => session('logged_in_user_id'),
        ]);
    
    $result = $response->json('error');

  return view('Goals/Goals',compact('result'));
    }


    public function Addgoal(){
        return view('Goals/Addgoals');
    }

public function addgoal_save(Request $request) {

$request->validate([
            'goal' => 'required',
            'goalAmount'=>"required|numeric",
            'Enddate'=>"required|date"
        ]);

$response = Http::post(env("API_URL").'/api/native-addgoals',[
            'userId' => session('logged_in_user_id'),
            'goal' => $request->goal,
            'GoalsAmount'=> $request->goalAmount,
            'Enddate'=>$request->Enddate,
        ]);

if ($response->failed()) {
            return back()->withErrors([
                'email' => 'Error Occured.',
     ]); 
}


return view('Goals/Addgoals',['saved'=>'saved']);
   
}

public function addgoalamount(Request $request){

$id = $request->id;

return view('Goals/addgoalAmmount',['id'=>$id]);

}

public function addgoalsAmount_save(Request $request){
  
$request->validate([
            'amount'=>"required|numeric",
            'id'=>'required',
        ]);

$response = Http::post(env("API_URL").'/api/native-addgoalsamount',[
            'userId' => session('logged_in_user_id'),
            'id' => $request->id,
            'amount'=> $request->amount,
        ]);
if ($response->failed()) {
            return back()->withErrors([
                'email' => 'Error Occured.',
     ]); 
}

return view('Goals/addgoalAmmount',['id'=>$request->id,'saved'=>'saved']);


}

public function deletegoals(Request $request){

$id = $request->id;
$request->validate([
            'id'=>'required',
        ]);
$response = Http::post(env("API_URL").'/api/native-deletegoal',[
            'id' => $request->id,
        ]);
 

 $response = Http::post(env("API_URL").'/api/native-viewgoal',[
            'userId' => session('logged_in_user_id'),
        ]);
    
    $result = $response->json('error');
    $saved = true;

  return view('Goals/Goals',compact('result','saved'));
    
}



}
