<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $size = $photo->getSize();
        $namePhoto = time() . "_" . $photo->getClientOriginalName();
        $path = 'images';
        $photo->move($path, $namePhoto);
        $data['image'] =  $namePhoto;
        $photo = Slider::create($data);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $photo = $request->file('photo');
        $size = $photo->getSize();
        $namePhoto = time() . "_" . $photo->getClientOriginalName();
        $path = 'images';
        $photo->move($path, $namePhoto);
        $data['image'] =  $namePhoto;
    
        $photo = Slider::find($request->id)->update($data);
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $photo = Slider::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
