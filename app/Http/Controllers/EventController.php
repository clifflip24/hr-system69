<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('calendar');
    }

    public function fetch()
    {
        // format for FullCalendar
        return Event::all()->map(function ($e) {
            return [
                'id' => $e->id,
                'title' => $e->event . ' (' . $e->status . ')',
                'start' => $e->date,
            ];
        });
    }

    public function store(Request $request)
    {
        Event::create([
            'date' => $request->date,
            'event' => $request->event,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }
}
