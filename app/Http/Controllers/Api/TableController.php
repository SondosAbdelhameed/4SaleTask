<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ErrorResponseResource;
use App\Http\Requests\Api\TableAvailabilityRequest;
use App\Traits\CheckTable;


class TableController extends Controller
{
    use CheckTable;

    public function checkAvailability(TableAvailabilityRequest $request) {

        $table = $this->checkCapacity($request->table_id , $request->guest_count);
        if($table){
            return response()->json(['status' => ['code'=>409,'message'=>'This table is not available']]);
        }
        $reservation = $this->checkReservation($request->table_id,$request->certain_datetime);
        if($reservation)
        return response()->json(['status' => ['code'=>409,'message'=>'This table is not available']]);
        
        return response()->json(['status' => ['code'=>200,'message'=>'This table is available']]);
    }

    
}
