<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers',[CustomerController::class, 'index']);
Route::post('/customers/{id}',[CustomerController::class, 'send']);

Route::get('/orders',[OrderController::class, 'index']);
Route::delete('/orders/{order}',[OrderController::class, 'destroy']);
Route::post('/orders/{id}',[OrderController::class, 'send']);
Route::get('/orders/{order}',[OrderController::class, 'edit']);
Route::put('/orders/{order}',[OrderController::class, 'update']);
