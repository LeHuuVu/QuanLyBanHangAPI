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

// version 1
// Don Hang Controller
Route::get('v1/getDH/{id}',[DonhangController::class,'index']);
Route::get('v1/detail/{id}',[DonhangController::class,'show']);
Route::post('v1/createDH/{id}',[DonhangController::class,'store']);
Route::post('v1/update/{id}',[DonhangController::class,'update']);
Route::get('v1/delete/{id}',[DonhangController::class,'destroy']);
Route::get('v1/deletemany',[DonhangController::class,'destroymany']);
// San Pham Controller
Route::get('v1/getSP',[SanphamController::class,'index']);



