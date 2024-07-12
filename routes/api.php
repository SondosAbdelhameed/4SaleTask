<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JWTCheckAuth;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::prefix('auth')->group(function () {

    //Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
});

Route::get('check_availability',[TableController::class,'checkAvailability']);
Route::post('reserve_table',[ReservationController::class,'reserveTable']);
Route::get('list_menu_items',[MealController::class,'listMenuItems']);


Route::middleware(JWTCheckAuth::class)->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::get('me', [AuthController::class,'me']);

    });
    Route::post('order',[OrderController::class,'store']);
    Route::post('pay',[OrderController::class,'pay']);

});
