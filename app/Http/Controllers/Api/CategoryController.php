<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->paginate(10);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List of category",
            ],
            "data"          => $category,
        ], 200);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Data post by category: " . $category->name,
                ],
                "data"          => $category->post()->latest()->paginate(10),
            ], 200);
        } else {
            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data post by category not found",
                ],
                "data"          => null,
            ], 404);
        }
    }
}
