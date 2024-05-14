<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function _constructor() {
        $this->middleware('checkUser');
    }
    public function index(){
        $users= User::get();
        $data['users'] =$users;
        return view('admin.home', $data);
    }
    public function adduser(){
        return view('admin.adduser');
    }
    public function saveuser(Request $req){
        $user= New user();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();

        session()->flash("massage", "user added successfully");
        return redirect()-> route("admin.home");
    }
    public function deleteuser($id){
        user::find($id)->delete();
        return back()->with("massage","user remove succcessfully");

    }
    public function edituser($id){
        $users= User::find($id);
        $data['users'] =$users;
        return view('admin\edituser', $data);
    }

    public function updateuser(Request $req){
        $user=user::find($req->id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();

        session()->flash("massage", "user update successfully");
        return redirect()-> route("admin.home");
    }
   
         public function products(){
            
        $users=DB::table('products')->get();
        return view('/admin.products',['data' => $users]);

   
}
public function customers(){
    $order= order::get();
    $data['order'] =$order;
    return view('admin.customer', $data);
    // $users=DB::table('orders')->get();
    //     return view('admin.customers',['data' => $users]);
}
}