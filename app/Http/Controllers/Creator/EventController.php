<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $events=Event::all();
        return view('creator.event.index', compact('events'));
    }

    public function create()
    {
        //display add / create form
        $pages = 'event'; //too highlight navbar if its selected
//      $users = User::pluck('id', 'name', 'email'); //pluck buat ambil bbrp row tabel, bukan semua
        $users = User::all();
        return view('creator.event.create', compact('pages', 'users'));
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('creator.event.index');
    }

//    public function show(Event $event)
//    Tambahan
    public function show($id)
    {
        $event = Event::findOrfail($id);

        $events = Event::all()->except($id)->pluck('id');
        $guestList = User::whereNotIn('id',function ($query) use ($events){
            $query->select('user_id')->from('event_user')
                ->whereNotIn('event_id', $events);
        })->where('role_id',3)->get();

        return view('creator.event.detail', compact('event','guestList'));
    }

    public function edit(Event $event)
    {
        //display edit form
        $pages = 'event'; //too highlight navbar if its selected
//        $users = User::pluck('id', 'name', 'email'); //pluck buat ambil bbrp row tabel, bukan semua
        $users = User::all();
        return view('creator.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        //update data from edit form

        $event->update($request->all());
        return redirect()->route('creator.event.index');
    }

    public function destroy(Event $event)
    {
        //delete data based on id
        $event->delete();
        return redirect()->route('creator.event.index');
    }
}
