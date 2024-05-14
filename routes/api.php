<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentcontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/add-user",[studentcontroller::class, 'registeruser']);

Route::get("/get-users",[studentcontroller::class, 'get_users']);
Route::post("login", [studentcontroller::class, 'checklogin']);
Route::get("/delete/{id}", [studentcontroller::class, 'deleteuser']);
Route::get("/get-users/{id}", [studentcontroller::class, 'edituser']);

Route::get("/order/{id}", [App\Http\Controllers\OrderController::class, "orderItems"]);

