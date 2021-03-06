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

        $events = Event::with(['user', 'types', 'sizes', 'extras', 'tickets', 'booth_purchases'])->latest()->paginate(10);

        $eventsrans = Event::with(['user', 'types', 'sizes', 'extras', 'tickets', 'booth_purchases'])->inRandomOrder()->paginate(10);

        return ['items' => $events, 'eventsrans' => $eventsrans];
    }

    /**s
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

        $user = $request->user();
        $req = $request->all();
        $req['user_id'] = $user->id;
        $event = Event::create($req);

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
        return $event;
    }

    // เซฟข้อมูลลง DB 
    // รวมข้อมูลจากหน้าแบบฟอร์ม ส่งมาในรูปแบบรีเควส 
    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = request()->user();
        $event->load(['user', 'types', 'sizes', 'extras', 'tickets', 'booth_purchases', 'booth_purchases.user', 'prices']);


        $recents = Event::inRandomOrder()->limit(10)->get();
        $event->canDel = $event->user->id ==
            $user->id;
        return ["item" => $event, 'recent' =>   $recents];
    }
// event detail 
// เช็ค id ว่าใช้อันเดียวกับที่สร้างมั้ย 
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

        $user = $request->user();
        $req = $request->all();
        $req['user_id'] = $user->id;
        // $event = Event::create($req);
        EventBoothType::where('event_id', $event->id)->delete();
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
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return time();
    }
}