<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pending;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Auth::user()->booking()->latest()->get();
        return view('client.reservation.index', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Booking::find($id);
        return view('client.reservation.edit', compact('reservation'));
    }

    public function updaterequest(Request $request)
    {
        $checkin_date = Carbon::parse($request->input('checkin_date'));
        $checkout_date = Carbon::parse($request->input('checkout_date'));
        $price = $request->price;
        $result = $checkin_date->diffInDays($checkout_date, false);

        if ($result > 0) {
            $new_price = $price * $result;
        }

        $reservationrequest = new Pending();
        
        $reservationrequest->checkin_date  = $request->checkin_date;
        $reservationrequest->checkout_date = $request->checkout_date;
        $reservationrequest->price = $new_price;
        $reservationrequest->save();

        Toastr::success('Request Sent to admin. Please wait for confermation','Success');
        return redirect()->route('client.reservations');
    }


    public function destroy($id)
    {

        if (Auth::user()) {

            $reservation = Booking::find($id);

            if ($reservation->room->is_available == false) {
                $reservation->room->is_available = true;
            }
            $reservation->room->save();

            $reservation->delete();
            Toastr::success('Reservation deleted successfully', 'Success');
            return redirect()->back();

        } else {
            Toastr::error('You don not have permission to do this', 'Sorry');
            return redirect()->back();
        }
        
    }
}
