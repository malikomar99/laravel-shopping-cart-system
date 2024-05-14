<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::post('addproduct', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
Route::get('/student', [App\Http\Controllers\studentController::class, 'student']);
Route::get('/', [App\Http\Controllers\productController::class, 'products'])->name('index');
Route::get('/product/{id}', [App\Http\Controllers\productController::class, 'productdetails'])->name('product-details');
Route::get('/addtocart/{id}', [App\Http\Controllers\productController::class, 'addcart'])->name('addtocart');
Route::get('/cart', [App\Http\Controllers\productController::class, 'showcart'])->name('showcart');

Route::get('addproduct', [App\Http\Controllers\productController::class, 'addproduct_form'])->name('addproduct.form');
Route::post('addproduct', [App\Http\Controllers\productController::class, 'addproduct'])->name('addproduct');
// Route::view('addproduct','addproduct');
// view idr sy pass ni krty 

// get route m request ni jati empty hota 
Route::get('checkout', [App\Http\Controllers\OrderController::class, 'order'])->name('checkout');
Route::post('process-order', [App\Http\Controllers\OrderController::class, 'process_order'])->name('process.order');
Route::get('removeitems/{id}', [App\Http\Controllers\productController::class, 'removeitems'])->name('removeitems');
Route::get('thankyou', [App\Http\Controllers\OrderController::class, 'order_completed'])->name('thankyou');
Route::get('about', [App\Http\Controllers\OrderController::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\OrderController::class, 'contact'])->name('contact');



// Route::get("reset-password", function() {
//     return view("reset-password");
// });

// Route::post("reset-password", function() {
//     $checkUser = DB::table("users")->where("email", $request->email)->first();
//     if($checkUser) {
//         $token = str::random(20);
//         DB::insert()->([email, token]);
//         $data['email'] = $request->email;
//         $data['token'] = $token;
//         return view("reset-password2", $data);
//         a href=localhost:8000/?token=$token

//     }
// });