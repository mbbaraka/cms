<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $events = Events::orderBy('id', 'DESC')->where('is_published', '1')->get();
        return view('admin.event.index',compact('events', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'details' => 'required',
            'venue' => 'required'
        ],
            [
                'title.required' => 'Event title is needed',
                'thumbnail.required' => 'Thumbnail is required',
                'details.required' => 'Event Details required',
                'venue.required' => 'Event Venue required',
                'start_date.required' => 'End Date of Event is required',
                'end_date.required' => 'End Date of Event is required',
            ]
        );


            $event = new Events();
            $event->user_id = Auth::id();
            $event->title = $request->title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->details = $request->details;
            $event->venue = $request->venue;
            $event->thumbnail = $request->thumbnail;
            $event->slug = str_slug($request->title);
            $event->is_published = $request->is_published;
            $save = $event->save();

        Session::flash('message', 'Event added successfully');
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Events::findOrFail($id);
        return view('admin.event.edit', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'details' => 'required',
            'venue' => 'required'
        ],
            [
                'title.required' => 'Event title is needed',
                'thumbnail.required' => 'Thumbnail is required',
                'details.required' => 'Event Details required',
                'venue.required' => 'Event Venue required',
                'start_date.required' => 'End Date of Event is required',
                'end_date.required' => 'End Date of Event is required',
            ]
        );


            $event = Events::findOrFail($id);
            $event->user_id = Auth::id();
            $event->title = $request->title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->details = $request->details;
            $event->venue = $request->venue;
            $event->thumbnail = $request->thumbnail;
            $event->slug = str_slug($request->title);
            $event->is_published = $request->is_published;
            $save = $event->save();
        

        Session::flash('message', 'Event updated successfully');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        // Delete image files
        Storage::delete($events->thumbnail);

        $events->delete();

        Session::flash('delete-message', 'Event deleted successfully');
        return redirect()->route('events.index');
    }
}
