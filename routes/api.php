<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Login\ProductController;
use App\Http\Controllers\API\Login\UserController;
use App\Http\Controllers\API\TransactionController;
use App\Models\Product;
use App\Models\Transaction;
use Doctrine\DBAL\Driver\Middleware;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function() {
    
    //User
    Route::post('/user/create', [UserController::class, 'create']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/edit/{id}', [UserController::class, 'update']);
    Route::post('/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);

    //Produk
    Route::post('/product/create', [ProductController::class, 'create']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/product/edit/{id}', [ProductController::class, 'update']);
    Route::post('/product/delete/{id}', [ProductController::class, 'delete']);

    //Transaction
    Route::post('/transaction/create', [TransactionController::class, 'create']);
    Route::post('/transaction/delete/{id}', [TransactionController::class, 'delete']);

});

Route::post('/login', [AuthController::class, 'login']);