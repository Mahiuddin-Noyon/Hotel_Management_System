<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Brian2694\Toastr\Facades\Toastr;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'title' => 'required',
        'descriptions' => 'required',
    ]);

    $notification = new Notification();

        $notification->title = $request->title;
        $notification->descriptions = $request->descriptions;
        $notification->save();

        Toastr::success('Notification addedd successfully','Success');
        return redirect()->route('admin.notification.index');
    
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin.notification.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
