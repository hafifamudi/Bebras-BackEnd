<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('admin.event.index', compact('event'));
    }
    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $event = Event::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $event = Event::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
