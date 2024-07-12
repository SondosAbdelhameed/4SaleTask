<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Meal;

class OrderService
{

    public function storeOrderDetails($order_id, $items) {
        $total_price = 0;
        foreach($items as $item){
            $total_price += $this->storeItem($order_id, $item);
        }
        return $total_price;
    }

    public function storeItem($order_id, $item) {
        $meal = Meal::find($item['meal_id']);
        $order_detaile = new OrderDetail();
        $order_detaile->order_id = $order_id;
        $order_detaile->meal_id = $item['meal_id'];
        $order_detaile->quantity = $item['quantity'];
        $order_detaile->price = $meal->price;
        $order_detaile->discount = $meal->discount;
        $order_detaile->amount_to_pay = $item['quantity']*($meal->price - $meal->discount);
        $order_detaile->save();
        return $order_detaile->amount_to_pay;
    }
}
