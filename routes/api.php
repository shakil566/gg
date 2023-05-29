<?php

use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer-create', [CustomerController::class, 'saveCustomer']);
