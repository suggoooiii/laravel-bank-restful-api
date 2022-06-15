<?php

use App\Models\Banknet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\GetBalanceController;

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
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/account',[GetBalanceController::class,'index']);
    Route::get('/account/balance',[GetBalanceController::class,'checkBalance']);
    Route::put('/account/withdraw',[WithdrawController::class,'store']);
    Route::put('/account/deposit', [ DepositController::class,'store']);

});

/**
 * http://127.0.0.1:8000/api/register
 * body:name=>muhannad
 * email=>muahnnadGG@gmail.com
 * password=>gjwsmr23
 * password_confirmation=>gjwsmr23
 *  */

/* {
    "user": {
        "name": "muhannad",
        "email": "muhannadGG@gmail.com",
        "updated_at": "2022-06-15T08:08:44.000000Z",
        "created_at": "2022-06-15T08:08:44.000000Z",
        "id": 2
    },
    "token": "2|dglF2i4uBPAompWPUj7IlpP7lXRX5ggExkshvnO5"
} */

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


// Route::post('/transfer', 'TransferController@store');


// Route::get('/balance',[GetBalanceController::class,'index']);

