<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GetBalanceController;
use App\Models\Banknet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[AuthController::class,'register']);

Route::get('/account/balance',[GetBalanceController::class,'show']);

Route::post('/account/withdraw',[]);
Route::post('/account/deposit', []);

// Route::post('/transfer', 'TransferController@store');


// Route::get('/balance',[GetBalanceController::class,'index']);

