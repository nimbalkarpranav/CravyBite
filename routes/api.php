<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppUserAuthController;

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


use App\Http\Controllers\RestaurantController;

Route::get('/restaurants', [RestaurantController::class, 'apiShow']);


Route::get('/all/restaurants', [RestaurantController::class, 'apiIndex']);


use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'apiIndex']);
Route::get('/products', [ ProductController::class, 'apiIndex']);



Route::post('app/register', [AppUserAuthController::class, 'register']);
Route::post('app/login', [AppUserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('app/profile', [AppUserAuthController::class, 'profile']);
});




