<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $size = $photo->getSize();
        $namePhoto = time() . "_" . $photo->getClientOriginalName();
        $path = 'images';
        $photo->move($path, $namePhoto);

        $data['image'] =  $namePhoto;
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['category_id'] = $request->category_id;
        $data['slug'] = $request->slug;
        $post = Post::create($data);
        return redirect(route('admin.post.index'))->with('success','Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        return view('admin.post.edit', compact('post','category'));
    }
    public function detail($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        return view('admin.post.detail', compact('post','category'));
    }
    public function update(Request $request)
    {
        $post = Post::find($request->id);
        if($request->photo != null){
            $photo = $request->file('photo');
            $size = $photo->getSize();
            $namePhoto = time() . "_" . $photo->getClientOriginalName();
            $path = 'images';
            $photo->move($path, $namePhoto);
            $data['image'] =  $namePhoto;
        }else{
            $data['image'] = $post->image;
        }
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['slug'] = $request->slug;
        $data['category_id'] = $request->category_id;
        $post->update($data);
        return redirect(route('admin.post.index'))->with('success','Data berhasil diubah');
    }
    public function delete(Request $request)
    {
        $post = Post::find($request->id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
