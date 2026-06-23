<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GroupsController extends Controller
{
  
public function index(){



 $response = Http::post(env("API_URL").'/api/native-viewgroups',[
            'userId' => session('logged_in_user_id'),
        ]);
    
$result = $response->json('error');


 return view('Groups/Groups',compact('result'));





}

public function Addgroup()  {


return view('Groups/Addgroup');
}


public function Addgroup_save(Request $request){
    $request->validate([
            'group'=>"required",
            'event'=>'required',
    ]);

$response = Http::post(env("API_URL").'/api/native-addgroup',[
            'userId' => session('logged_in_user_id'),
            'group' => $request->group,
            'event'=> $request->event,
        ]);

       return redirect('groups');

}

public function contributegroup(Request $request)  {

/*$response = Http::post(env("API_URL").'/api/native-contributegroup',[
            'userId' => session('logged_in_user_id'),
            'id' => $request->id,
            'amount'=> $request->amount,
        ]);


return $request->id;*/

return view('Groups/contribute',['id'=>$request->id]);
    
}


public function contribute_save(Request $request) {

$response = Http::post(env("API_URL").'/api/native-contribute',[
            'userId' => session('logged_in_user_id'),
            'id' => $request->id,
            'amount'=> $request->amount,
        ]);


return view('Groups/contribute',['id'=>$request->id,'saved'=>'saved']);
    
}

public function veiwmember(Request $request) {

$response = Http::post(env("API_URL").'/api/native-viewmember',[
            'groupId' => $request->id,
        ]);
    
$result = $response->json('error');


return view('Groups/ViewMember',['gid'=>$request->id],compact('result'));
    
}


public function viewcontribution(Request $request) {

 $response = Http::post(env("API_URL").'/api/native-viewcontribution',[
            'userId' => $request->id,
            'groupId' => $request->groupid,
        ]);
    
          $result = $response->json('error');

return view('Groups/viewcontribution',compact('result'));


}


public function Addmember(Request $request) {

$groupid = $request->groupid;

return view('Groups/Addmember',compact('groupid'));
    
}


public function addmembersave(Request $request){

$groupid = $request->id;
$member = $request->member;

$response = Http::post(env("API_URL").'/api/native-addmember',[
            'Id' => $member,
            'groupId' => $groupid,
        ]);

$response = Http::post(env("API_URL").'/api/native-viewmember',[
            'groupId' => $request->id,
        ]);
    
$result = $response->json('error');


return view('Groups/ViewMember',['gid'=>$request->id],compact('result'));


}

}
