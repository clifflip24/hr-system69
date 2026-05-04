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
        return response()->json(
            Event::all()->map(function ($e) {
                return [
                    'id' => $e->id, // ✅ needed for edit/delete
                    'title' => $e->event . ' (' . $e->status . ')',
                    'start' => $e->date,
                ];
            })
        );
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'event' => $request->event,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
