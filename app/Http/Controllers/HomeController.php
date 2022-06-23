<?php

namespace App\Http\Controllers;

use App\Facilitiy;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('frontend.home',compact('rooms'));
    }
    public function room()
    {
        $rooms = Room::all();
        return view('frontend.room',compact('rooms'));
    }
    public function restaurant()
    {
        $restaurants = Facilitiy::all();
        return view('frontend.restaurant',compact('restaurants'));
    }
    public function about()
    {
        //
    }
    public function contact()
    {
        //
    }
}
