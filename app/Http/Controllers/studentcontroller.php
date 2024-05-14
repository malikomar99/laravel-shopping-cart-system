<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class studentcontroller extends Controller
{
     public function student()
     {
        $data=student::all();

        return view('student',compact('data'));
     }
     public function get_users()
     {
         $users= user::get();
         return response()->json($users);
     }
     public function registeruser(Request $req){
         User::create([
            'name'=>$req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            
        ]);
        return response()->json(["user register successfully"]);
     }
     public function checklogin (Request $req){
        $user = user::where("email",$req->email)->first();

        if($user){
            if(Hash::check($req->password, $user->password)){
                return response()->json($user);
            }else{
                return response()->json(["msg"=>"invalid password"]);
            }
        }else{
            return response()->json(["msg"=>"user not found"]);
        }
       
     }
     public function deleteuser($id){
        $find=user::find($id);
        if ($find) {
            user::where("id",$id)->delete();
            return response()->json(["msg"=>"user delete"]);
        }else{
            return response()->json(["msg"=>"user not found"]);
        }
     }
     public function edituser($id){
        $find=user::find($id);
         return response()->json($find);
     }
 
}
