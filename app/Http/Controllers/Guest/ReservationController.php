<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Auth::user()->booking()->latest()->get();
        return view('client.reservation.index', compact('reservations'));
    }


    public function destroy($id)
    {
        if (Auth::user()) {

            
            $reservation = Booking::find($id);
            return $reservation;


            // $room = Room::find($id);
            // if ($room->is_available == false) {
            //     $room->is_available = true;
            // }
            // $room->save();


            // Toastr::success('Reservation deleted successfully', 'Success');
            // return redirect()->back();
        }
    }
}
