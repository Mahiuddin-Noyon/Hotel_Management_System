<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Facilitiy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $room = Room::all();
        $available_room = Room::where('is_available',true)->get();
        $category = Category::all();
        $contact = Contact::where('status',0)->get();
        $total_contact = Contact::all();
        $facility = Facilitiy::all();

        return view('admin.dashboard', compact('room','available_room','category','contact','facility','total_contact')); 
    }
}
