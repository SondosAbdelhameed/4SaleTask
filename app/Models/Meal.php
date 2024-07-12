<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    protected $appends = [
        'quantity'
    ];


    public function getQuantityAttribute() {
        return $this->available_quantity - $this->todayOrderMeals()->sum('quantity');
    }

    /*public function todayOrderMeals() {
        return $this->hasMany(OrderDetail::class,'meal_id','id')->whereDate('created_at',Carbon::today());
    }

    public function available() {
        dd($this->todayOrderMeals()->sum(''));
        $quantity = $this->todayOrderMeals()->sum('quantity');
        return $query->where('available_quantity', '>' ,$quantity);
    }*/
}
