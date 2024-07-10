<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meal extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'description',
        'available_quantity',
        'discount'
    ];

    public function todayOrderMeals() {
        return $this->hasMany(OrderDetail::class,'id','meal_id')->whereDate('created_at',Carbon::today());
    }

    public function availableMeal() {
        return $this->where('available_quantity', '>' ,$this->todayOrderMeals()->count())->get();
    }
}
