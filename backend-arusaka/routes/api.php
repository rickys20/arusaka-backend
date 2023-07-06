<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PartnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\UserController;

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

Route::get('test', function () {
    return new JsonResponse([
        'message' => 'Hello from staging'
    ], 200);
});

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::prefix('categories')->group(function () {
            Route::get('', [CategoriesController::class, 'getAll']);
            Route::post('', [CategoriesController::class, 'store']);
            Route::get('{category}', [CategoriesController::class, 'getDetailCategory']);
            Route::put('{category}', [CategoriesController::class, 'editCategory']);
            Route::delete('{category}', [CategoriesController::class, 'deleteCategory']);
        });

    });

    Route::prefix('partners')->group(function () {
        Route::get('', [PartnerController::class, 'getAll']);
        Route::post('', [PartnerController::class, 'store']);
        Route::get('{partner}', [PartnerController::class, 'getDetailPartner']);
        Route::put('{partner}', [PartnerController::class, 'editPartner']);
        Route::delete('{partner}', [PartnerController::class, 'deletePartner']);
    });

});
