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
            return "This table is not available";
        }
        $reservation = $this->checkReservation($request->table_id,$request->certain_datetime);
        if($reservation)
            return "This table is not available";
        
        return "This table is available";
    }

    
}
