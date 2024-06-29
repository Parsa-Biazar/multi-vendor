<?php

use App\Http\Controllers\API\V1\HomepageController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->prefix('/v1')
    ->group(function() {
        Route::get('/',[HomepageController::class,'index']);
        Route::get('/{product}',[HomepageController::class,'show']);
    });
