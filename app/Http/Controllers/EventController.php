<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\GoogleCalendar\Event as GoogleCalendarEvent;
use Carbon\Carbon;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //        $event = Event::get();
     // dd($event);
        return view('admin.event.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

public function create(Request $request)
{  
    $event = new GoogleCalendarEvent;
    
    $event->name = $request->name;

    // Parse the provided date, startDateTime, and endDateTime
    $date = Carbon::parse($request->date);
    $startDateTime = Carbon::parse($request->startDateTime);
    $endDateTime = Carbon::parse($request->endDateTime);

    // // Set the start and end times for the event
   // $event->addAttendee(['email' => '']);
   $event->addAttendee([
    'email' => 'nikhil@nlet.in',
    'name' => 'John Doe',
    'comment' => 'Lorum ipsum',
]);
    $event->startDateTime = $date->copy()->setTimeFrom($startDateTime);
    $event->endDateTime = $date->copy()->setTimeFrom($endDateTime);

    $event->description = $request->description;

    $event->save();
 // dd($event);
    \Session::flash('success', 'Event Created Successfully.');
    return \Redirect::route('admin.event.create');
}




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
