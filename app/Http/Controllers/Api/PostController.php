<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->paginate(10);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List of posts",
            ],
            "data"          => $post,
        ], 200);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail of posts",
                ],
                "data"          => $post,
            ], 200);
        } else {
            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Detail of posts not found",
                ],
                "data"          => null,
            ], 404);
        }
    }
}
