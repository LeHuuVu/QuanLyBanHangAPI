<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\SanphamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);

// version 1
// Don Hang Controller
Route::get('v1/getDH/{id}',[DonhangController::class,'index']);
Route::get('v1/detail/{id}',[DonhangController::class,'show']);
Route::post('v1/createDH/{id}',[DonhangController::class,'store']);
Route::post('v1/BuySP/{id}',[DonhangController::class,'store1SP']);
Route::post('v1/update/{id}',[DonhangController::class,'update']);
Route::get('v1/delete/{id}',[DonhangController::class,'destroy']);
Route::get('v1/deletemany',[DonhangController::class,'destroymany']);

Route::get('v1/findUnAccept/{id}',[DonhangController::class,'findUnAccept']);
// San Pham Controller
Route::get('v1/getSP',[SanphamController::class,'index']);
Route::get('v1/SP/detail/{id}',[SanphamController::class,'show']);
// version 2
// Don Hang Controller
Route::post('v2/getDH',[DonhangController::class,'index2']);
Route::get('v2/detail/{id}',[DonhangController::class,'show2']);
Route::post('v2/createDH/{id}',[DonhangController::class,'store2']);
Route::post('v2/BuySP',[DonhangController::class,'store1SP2']);
//version 3
Route::post('v3/detail',[DonhangController::class,'show3']);



