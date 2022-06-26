<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request,[
            'search' => 'required',
        ]);
        
        $search = $request->input('search');
        $rooms = Room::where('name', 'LIKE', "%$search%")->get();
        return view('frontend.search',compact('rooms','search'));
    }
}
