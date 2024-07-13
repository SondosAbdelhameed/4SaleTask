<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MealResource;
use App\Models\Reservation;
use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class MealController extends Controller
{
    public function listMenuItems() {
        /*$meals = DB::table('meals as m')->select('m.id', 'm.available_quantity', DB::raw('SUM(ord.quantity) as day_count'))
        ->leftjoin('order_details as ord','m.id' , '=' , 'ord.meal_id')
        ->whereDate('ord.created_at',Carbon::today())
        ->groupBy('m.id')->having('day_count' , '<' , 'm.available_quantity')->orHavingNull('day_count')->get();
        return response()->json($meals);*/

        $meals = Meal::all();
        return MealResource::collection($meals);
    }
}
