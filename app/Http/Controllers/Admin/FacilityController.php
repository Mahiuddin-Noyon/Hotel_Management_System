<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Facilitiy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facilitiy::all();
        return view('admin.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.facility.create', compact('categories'));
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
            if (!file_exists('uploads/facility')) {
                mkdir('upload/facility', 0777, true);
            }
            $image->move('uploads/facility', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $facility = new Facilitiy();

        $facility->name = $request->name;
        $facility->slug = str_slug($request->name);
        $facility->category_id = $request->category;
        $facility->description = $request->description;
        $facility->image = $imagename;
        $facility->save();
        return redirect()->route('admin.facility.index')->with('successMsg', 'Facility Added Successfully');
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
        $facility = Facilitiy::find($id);
        $categories = Category::all();
        return view('admin.facility.edit', compact('facility', 'categories'));
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
        $facility = Facilitiy::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currendate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currendate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/facility')) {
                mkdir('upload/facility', 0777, true);
            }
            if (file_exists('uploads/facility/' . $facility->image)) {
                unlink('uploads/facility/' . $facility->image);
            }
            $image->move('uploads/facility', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $facility->name = $request->name;
        $facility->slug = str_slug($request->name);
        $facility->category_id = $request->category;
        $facility->description = $request->description;
        $facility->image = $imagename;
        $facility->update();
        return redirect()->route('admin.facility.index')->with('successMsg', 'Facility Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facilitiy::find($id);
        if (file_exists('uploads/facility/' . $facility->image)) {
            unlink('uploads/facility/' . $facility->image);
        }
        $facility->delete();
        return redirect()->back()->with('successMsg', 'Facility Deleted Successfully');
    }
}
