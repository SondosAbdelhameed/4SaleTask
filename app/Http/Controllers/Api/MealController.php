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
        $meals = new Meal;
        return( $meals->availableMeal());
        return MealResource::collection($meals->availableMeal());
    }
}
