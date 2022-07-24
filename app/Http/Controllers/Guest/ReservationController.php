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
        $reservations = Booking::orderBy('id', 'DESC')->paginate(5);
        return view('client.reservation.index', compact('reservations'));
    }


    public function destroy($id)
    {
       $destroy = Booking::find($id);
    }
}
