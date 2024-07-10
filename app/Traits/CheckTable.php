<?php

namespace App\Traits;

use App\Models\Table;
use App\Models\Reservation;

trait CheckTable
{
    public function checkCapacity($table_id,$capacity) {
        return Table::where('id',$table_id)->where('capacity','<', $capacity)->first();
        
    }

    public function checkReservation($table_id,$certain_datetime) {
        return Reservation::where('table_id',$table_id)->where('from_time','<=', $certain_datetime)
        ->where('to_time','>', $certain_datetime)
        ->first();
    }
}
