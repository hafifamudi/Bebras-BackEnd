<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->paginate(5);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List of sliders",
            ],
            "data"          => $slider,
        ], 200);
    }
}
