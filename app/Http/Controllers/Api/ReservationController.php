<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReservationRequest;
use App\Traits\CheckTable;
use App\Models\Reservation;
use App\Models\Customer;

class ReservationController extends Controller
{
    use CheckTable;

    public function reserveTable(ReservationRequest $request) {
        $reservation = $this->checkReservation($request->table_id,$request->from_time);
        if($reservation)
            return response()->json(['status' => ['code'=>409,'message'=>'This table is not available']]);
        
        $customer_id = $this->getCustomer($request->customer_name,$request->customer_phone);
        unset($request['customer_name']);
        unset($request['customer_phone']);
        $request['customer_id'] = $customer_id;   
        $reservation = Reservation::create($request->all());
        return response()->json(['status' => ['code'=>200,'message'=>'Resrvation Added Successfully']]);
    }

    public function getCustomer($name,$phone) {
        if(($customer = Customer::where('phone',$phone)->first()) != ''){
            return $customer->id;
        }

        $customer = Customer::create([
            'name' => $name,
            'phone' => $phone
        ]);
        return $customer->id;
    }
}
