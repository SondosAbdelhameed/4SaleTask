<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\MealController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::get('check_availability',[TableController::class,'checkAvailability']);
Route::post('reserve_table',[ReservationController::class,'reserveTable']);
Route::get('list_menu_items',[MealController::class,'listMenuItems']);
