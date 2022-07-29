<?php

namespace App\Http\Controllers\Guest;

use App\Booking;
use App\Facilitiy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        $available_room = Room::where('is_available',true)->get();
        $facilities = Facilitiy::all();
        return view('client.dashboard', compact('reservations','available_room','facilities'));
    }
}
