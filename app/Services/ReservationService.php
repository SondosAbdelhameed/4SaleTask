<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationService
{
    use CheckTable;

    public function store($request) {
        $reservation = new Reservation();
    }
}
