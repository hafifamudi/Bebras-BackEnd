<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::latest()->paginate(10);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List of events",
            ],
            "data"          => $event,
        ], 200);
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();
        if ($event) {
            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail of events",
                ],
                "data"          => $event,
            ], 200);
        } else {
            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Detail of events not found",
                ],
                "data"          => null,
            ], 404);
        }
    }
}
