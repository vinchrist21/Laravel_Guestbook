<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $user = User::findOrFail($request->user_id);
        $attend = $user->attends()->syncWithoutDetaching($request->event_id, ['is_approved' => '0']);
        return empty($attend) ? redirect()->back()->with('Fail', "Failed to add new guest")
            : redirect()->back()->with('Success', 'Guest Added');
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

    public function approve($id, Request $request){
        $user = User::findOrFail($id);
        $event = $user->attends->where('id','=',$request->event_id)->first();
        $event->pivot->update([
           'is_approved'=>'1',
        ]);

        return empty($event) ? redirect()->back()->with('Fail', "Failed to update status")
            : redirect()->back()->with('Success', 'Guest Approved');
    }

    public function decline($id, Request $request){
        $user = User::findOrFail($id);
        $event = $user->attends->where('id','=',$request->event_id)->first();
        $event->pivot->update([
            'is_approved'=>'2',
        ]);

        return empty($event) ? redirect()->back()->with('Fail', "Failed to update status")
            : redirect()->back()->with('Success', 'Guest Approved');
    }
}
