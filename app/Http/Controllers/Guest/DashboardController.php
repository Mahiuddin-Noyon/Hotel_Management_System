<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        return view('client.dashboard', compact('reservations'));

    }
}
