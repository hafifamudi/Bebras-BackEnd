<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete(Request $request, $id)
    {
        $category = Category::find($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
