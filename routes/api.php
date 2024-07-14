<?php

use App\Http\Controllers\API\V1\Admin\ProductController;
use App\Http\Controllers\api\v1\front\AuthController;
use App\Http\Controllers\API\V1\Front\MainPageController;
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


//Route::middleware('guest')->prefix('/v1')
Route::prefix('/v1')
    ->group(function() {
        Route::get('/', [MainPageController::class, 'index']);
        Route::prefix('/categories')
            ->group(function() {
                Route::get('/', [MainPageController::class, 'categories']);
                Route::get('/{category}', [MainPageController::class, 'showOneCategory']);
            });
        Route::prefix('/brands')
            ->group(function() {
                Route::get('/', [MainPageController::class, 'brands']);
                Route::get('/{brand}', [MainPageController::class, 'showOneBrand']);
            });
        Route::get('/register',[AuthController::class,'registershow']);
        Route::get('/login',[AuthController::class,'loginshow']);
        Route::post('/register',[AuthController::class,'register']);
        Route::post('/login',[AuthController::class,'login']);
        Route::prefix('/admin')->middleware('sanctum')->group(function (){
            Route::get('/',[ProductController::class,'index']);
        });
        Route::get('/{product}', [MainPageController::class, 'show']);
    });
