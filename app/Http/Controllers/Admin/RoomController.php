<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use Carbon\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.room.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/room')) {
                mkdir('upload/room', 0777, true);
            }
            $image->move('uploads/room', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $room = new Room();

        $room->name = $request->name;
        $room->slug = str_slug($request->name);
        $room->category_id = $request->category;
        $room->description = $request->description;
        $room->image = $imagename;
        $room->save();
        Toastr::success('success','Room added successfully');
        return redirect()->route('admin.room.index')->with('successMsg', 'Room Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $categories = Category::all();
        return view('admin.room.edit', compact('room', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/room')) {
                mkdir('upload/room', 0777, true);
            }
            if (file_exists('uploads/room/' . $room->image)) {
                unlink('uploads/room/' . $room->image);
            }
            $image->move('uploads/room', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $room->name = $request->name;
        $room->slug = str_slug($request->name);
        $room->category_id = $request->category;
        $room->description = $request->description;
        $room->image = $imagename;
        $room->update();
        return redirect()->route('admin.room.index')->with('successMsg', 'Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if (file_exists('uploads/room/' . $room->image)) {
            unlink('uploads/room/' . $room->image);
        }
        $room->delete();
        return redirect()->back()->with('successMsg', 'Room Deleted Successfully');
    }
}
