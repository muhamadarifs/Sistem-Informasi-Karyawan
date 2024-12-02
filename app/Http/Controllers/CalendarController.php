<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        return view('full-calendar',[
            "title" => "Calendar"
        ]);
    }

    public function listEvent(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Event::where('start_date', '>=', $start)->where('end_date', '<=', $end)->get()
        ->map(function ($item) {
            $backgroundColor = null;

            switch ($item->category) {
                case 'Hari Libur':
                    $backgroundColor = 'red';
                    break;
                case 'Event Kantor':
                    $backgroundColor = '#33FFE6';
                    break;
                default:
                    $backgroundColor = '';
                    break;
            }

            return [
                'id' => $item->id,
                'title' => $item->title,
                'start' => $item->start_date,
                'end' => date('Y-m-d', strtotime($item->end_date. '+1 days')),
                'category' => $item->category,
                'backgroundColor' => $backgroundColor,
            ];
        });

        return response()->json($events);
    }

    public function create(Event $event)
    {
        return view('components.form.event-form', ['data' => $event,'action' => route('events.store')]);
    }

    public function store(EventRequest $request, Event $event)
    {
        return $this->update($request, $event);
    }


    public function edit(Event $event)
    {
        return view('components.form.event-form', ['data' => $event, 'action' => route('events.update', $event->id)]);
    }

    public function update(EventRequest $request, Event $event)
    {
        if ($request->has('delete')) {
            return $this->destroy($event);
        }
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->title = $request->title;
        $event->category = $request->category;

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully.',
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully deleted data.'
        ]);
    }


}
