<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Session;
use Str;

class productcontroller extends Controller
{
//     public function getproducts(){
//   $products= Product::get();
//   $data['title'] = "product page";
//   $data['products'] = $products;
//   return view("index",$data);
//     }
    // public function productdetails($id=0){
    //     $product =product::find($id);
    //     dd();
    // }

    public function products(){
        $users=DB::table('products')->get();
        return view('/index',['data' => $users]);
        // foreach($users as $user){
        //     echo $user;
        }
        public function productdetails(string $id){
            $users=DB::table('products')->where('id',$id)->get();
            return view('productdetails',['data'=>$users]);
        }
        // public function addproduct(Request $req){
        //     $product=DB::table('products')->insert([
        //         'images'=>$req->images,
        //         'title'=>$req->title,
        //         'description'=>$req->description,
        //         'quantity'=>$req->quantity,
        //         'price'=>$req->price
                
        //     ]);
        //    return redirect('index');
        // }
        // public function add(Request $req){
        //     $_REQUEST->validate([
        //         'images'=>'required',
        //         'title'=>'required',
        //         'description'=>'required|numeric',
        //         'quantity'=>'required|numeric',
        //         'price'=>'required'
                
        //     ]);
        // }
        public function addproduct_form() {
            return view('addproduct');
        }
        public function addproduct(Request $request){
           
            $request->validate([
                'images'=>['mimes:png,jpg,jpeg'],
                'title'=>'required',
                'description'=>'required',
                'quantity'=>'required|numeric',
                'price'=>'required|numeric'
                
            ]);
            // ye is lye define kya agr ap file upload ni krty to ye undefine ho jana
            $filepath = "";
            if ($request->hasFile('images')) {

                $file=$request->file('images');
                
                $fileExt=$file->getclientoriginalExtension();
                $filename=$file->getclientoriginalname();
                $newname=$filename.'-'.str::random(10).'.'.$fileExt;
                // apny move phly krwaya hua or name baad m get kr rhy
                // move ka mtlb hy k ap file upload kr rhy dir m
                $file->move(public_path('assets/images'), $newname);
                // double qoutes m variable bhi pass ho jata mtlb concat ki zroort ni hy

                $filepath="/assets/images/$newname";
            }
            // or intialization top py ni krty reason agr validate ni hota to redirect ho jana 
            // or hmara instance vcreate ho jana jiski hmain filhal zroort ni hy point smjh aya ?
            // yes sir
            $product= new product();
            $product->images=$filepath; // idr ap use kr rhy
            $product->title=$request->title;
            $product->description=$request->description;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->save();
            
            return redirect('index');

        }
        public function addcart($id){
            $cart=Session::get('cart',[]);
            $product=product::find($id);
            if( isset($cart[$id]) && $cart[$id]['quantity'] == $product->quantity ){
                return back()->with("massage", "You can add max ".$product->quantity." items");
            }
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            }else{
                $cart[$id]=[
                    'id'=>$id,
                    'images'=>$product->images,
                    'title'=>$product->title,
                    'price'=>$product->price,
                    'quantity'=>1


                ];
            }
            Session::put('cart',$cart);
            Session::flash('massage','product added to cart successfully');
            return back();
        }
        public function showcart(){
            return view('cart');
        }
        public function checkout(){
            return view('checkout');
        }
        public function removeitems($id){
            $cart= Session::get('cart');
            if(isset($cart[$id])){
                unset($cart[$id]);
            }
            Session::put('cart',$cart);
            return back()->with("massage","item remove from your cart");

        }
    }

