<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photo = Photo::all();
        return view('admin.photo.index', compact('photo'));
    }
    public function store(Request $request)
    {
        if($request->photo != null){
            $photo = $request->file('photo');
            $size = $photo->getSize();
            $namePhoto = time() . "_" . $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $namePhoto);
            $data['image'] =  $namePhoto;
        }
        $data['caption'] = $request->caption;
        $photo = Photo::create($data);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        if($request->photo != null){
            $photo = $request->file('photo');
            $size = $photo->getSize();
            $namePhoto = time() . "_" . $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $namePhoto);
            $data['image'] =  $namePhoto;
        }
        $data['caption'] = $request->caption;
        $photo = Photo::find($request->id)->update($data);
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete($id)
    {
        $photo = Photo::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
