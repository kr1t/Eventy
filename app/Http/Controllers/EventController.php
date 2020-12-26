<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventBoothType;
use App\EventTicket;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['user', 'types', 'sizes', 'extras', 'tickets'])->paginate(10);
        return ['items' => $events];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $event = Event::create($request->all());

        foreach ($request->type as $type) {
            if ($type['name']) {
                $type['status'] = 1;
                $type['event_id'] = $event->id;
                EventBoothType::create($type);
            }
        }

        foreach ($request->size as $type) {
            if ($type['name']) {
                $type['status'] = 2;
                $type['event_id'] = $event->id;
                EventBoothType::create($type);
            }
        }
        foreach ($request->extra as $type) {
            if ($type['name']) {
                $type['status'] = 3;
                $type['event_id'] = $event->id;
                EventBoothType::create($type);
            }
        }

        foreach ($request->prices as $type) {
            if ($type['price']) {
                $type['event_id'] = $event->id;
                EventTicket::create($type);
            }
        }
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event->load(['user', 'types', 'sizes', 'extras', 'tickets']);
        return ["item" => $event];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}