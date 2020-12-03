@extends('creator.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Event {{$event->title}} Detail's</h1>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend><b>Event Information</b></legend>
                    @include('creator.event.event_information')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editEvent-{{$event->id}}" @if($event->status == 1) disabled
                                    title="Can't edit while event is opened" @endif>Edit Event Detail
                            </button>
                            @include('creator.event.edit')
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><b>Attendee List</b></legend>
                    <div class="row">
                        @include('creator.event.guest_list')
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection
