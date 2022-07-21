<?php

namespace App\Http\Controllers;

use App\Room;
use Brian2694\Toastr\Facades\Toastr;
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

        $data = $request->all();
        $request->session()->put('storedata', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        
        return $request->session()->get('store');
        return view('frontend.payment');
        
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
        //
    }
}
