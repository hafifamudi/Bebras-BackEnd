<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::all();
        return view('admin.video.index', compact('video'));
    }
    public function detail($id)
    {
        $video = Video::find($id);
        return view('admin.video.detail', compact('video'));
    }
    public function store(Request $request)
    {
        $video = Video::create($request->all());
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $video = Video::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $video = Video::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
