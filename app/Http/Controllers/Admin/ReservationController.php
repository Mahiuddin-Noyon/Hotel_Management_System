<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pending;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Pending::all();
        return view('admin.pending.index', compact('reservations'));
    }
    public function show($id)
    {
        $reservation = Pending::findorFail($id);
        return view('admin.pending.show', compact('reservation'));
    }
    public function update(Request $request, $id)
    {
        //
    }
}
