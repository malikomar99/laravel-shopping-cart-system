<?php


Auth::routes();
Route::group(['middleware'=> 'auth'],function(){

Route::get('/admin/home',[App\Http\Controllers\AdminController::class, 'index'])->name("admin.home");
Route::get('/admin/adduser',[App\Http\Controllers\AdminController::class, 'adduser'])->name("admin.adduser");
Route::post('/admin/adduser',[App\Http\Controllers\AdminController::class, 'saveuser'])->name("post.user");
Route::get('/admin/adduser/{id}',[App\Http\Controllers\AdminController::class, 'deleteuser'])->name("delete.user");
Route::get('/admin/edituser/{id}',[App\Http\Controllers\AdminController::class, 'edituser'])->name("admin.edit.user");
Route::post('/admin/update',[App\Http\Controllers\AdminController::class, 'updateuser'])->name("update.user");
Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'products'])->name("admin.products");
Route::get('/admin/customers', [App\Http\Controllers\AdminController::class, 'customers'])->name("admin.customers");
Route::get("/admin/order", [App\Http\Controllers\OrderController::class, "get_orders"])->name("admin.orders");
});
