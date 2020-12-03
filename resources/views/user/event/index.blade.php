{{--@extends('layout.main')--}}
{{--@extends('layouts.app')--}}

{{--@section('judul', 'HOME')--}}
{{--@section('content')--}}
{{--    @include('user.event.modal.add')--}}
{{--    <div class="container">--}}
{{--        <div class="title">--}}
{{--            <h1>List Data (Nicky Santano - 0706011910011)</h1>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @auth()--}}
{{--                <div class="col-md-2 offset-md-10">--}}
{{--                    <a href="" class="btn btn-primary btn-block" role="button" aria-pressed="true">ADD</a>--}}
{{--                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">--}}
{{--                        Join Event--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--        <hr>--}}

{{--        <table id="list" style="width: 100%">--}}
{{--            <tr>--}}
{{--                <th scope="col">Title</th>--}}
{{--                <th scope="col">Description</th>--}}
{{--                <th scope="col">Status</th>--}}
{{--                <th scope="col">Owned By</th>--}}
{{--                <th scope="col">Updated At</th>--}}
{{--                <th scope="col">Created At</th>--}}
{{--                <th scope="col">Action</th>--}}
{{--            </tr>--}}


{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('user.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row no-gutters">
                    <div class="col md-10">
                        <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">My Event Application</h1>
                    </div>
                    <div class="col md-2">
                        <button type="button" class="btn btn-dark btn-circle float-right" title="Create New Event" data-toggle="modal"
                                data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                        @include('user.event.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($attends) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Event Id</th>
                                <th>Event Title</th>
                                <th>Event Description</th>
                                <th>Event Date</th>
                                <th>Application Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attends as $event)
                                <tr class="text-center">
                                    <td>{{$event->id}}</td>
                                    <td>{{$event->title}}</td>
                                    <td><a type="button" class="text-primary" data-toggle="modal"
                                           data-target="#showModal-{{$event->id}}">Read</a></td>
                                    @include('user.event.show_description')
                                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</td>
                                    <td>@if($event->pivot->is_approved == 0) <p class="text-warning">Pending</p>
                                        @elseif($event->pivot->is_approved == 1) <p class="text-success">Approved</p>
                                        @else <p class="text-danger">Rejected</p> @endif </td>
                                    <td width="150px">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <form action="{{route('user.events.destroy', $event->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-circle"
                                                            title="Withdrawal from application"
                                                            type="submit"
                                                            @if($event->pivot->is_approved != 0) disabled @endif>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

