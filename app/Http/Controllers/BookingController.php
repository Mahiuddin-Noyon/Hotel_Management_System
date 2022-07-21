<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // if(!Auth::user())
        // {
        //     Toastr::warning('Please login before booking','Login First');
        //     return redirect()->back();
        // }

        $room = Room::find($id);
        return view('frontend.booking', compact('room'));
    }

    public function after_payment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkin_date = Carbon::parse($request->input('checkin_date'));
        $checkout_date = Carbon::parse($request->input('checkout_date'));
        $price = $request->price;
        $result = $checkin_date->diffInDays($checkout_date, false);
        
        if( $result>0)
        {
            $total_price = $price*$result;
        }
        
        $booking = new Booking();
        $booking->user_id = Auth::user()->id;
        $booking->user_id = $booking->room->id;
        $booking->checkin_date = $request->checkin_date;
        $booking->checkout_date = $request->checkout_date;
        $booking->total_person = $request->person;
        $booking->price = $total_price;
        $booking->save();
        Toastr::success('Success','Data Stored Succesfully');
        return redirect()->route('home');
    }
}
