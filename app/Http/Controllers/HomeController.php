<?php

namespace App\Http\Controllers;

use App\Category;
use App\Facilitiy;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.home',compact('categories'));
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
    public function single($id)
    {
        $room =  Room::find($id);
        return view('frontend.single', compact('room'));
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
