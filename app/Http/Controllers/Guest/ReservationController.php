<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        return view('client.reservation.index', compact('reservations'));
    }
}
