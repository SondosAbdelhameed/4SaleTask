<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MealResource;
use App\Models\Reservation;
use App\Models\Meal;

class MealController extends Controller
{
    public function listMenuItems() {
        //$meal = Meal::withSum('todayOrderMeals','quantity')->get();
        $meals = Meal::all();
        //return $meal;
        //return Meal::with('todayOrderMeals')->get();
        //$meals = Meal::available()->get();
        //$meals = new Meal();
        return MealResource::collection($meals);
    }
}
