<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register',[Usercontroller::class, 'register']);
Route::post('login',[Usercontroller::class, 'login']);
Route::post('addproduct',[ProductController::class, 'addProduct']);
