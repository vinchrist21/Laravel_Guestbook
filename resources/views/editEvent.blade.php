{{--@extends('layout.main')--}}
@extends('layouts.app')

@section('judul', 'ADD Student')
@section('content')

    <div class="container">
        <div class="title">
            <h1>Edit Data</h1>
        </div>

        <div class="daftar">
            <form class="daftarlist" method="POST" action="{{ route('event.update', $event) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <h2>Title:</h2>
                <input type="text" placeholder="title" name="title" value="{{ $event->title }}"><br>

                <h2>Description:</h2>
                <textarea type="text" placeholder="description..." name="description">{{ $event->description }}</textarea><br>

{{--                <select name="created_by" class="custom-select">--}}
{{--                    @foreach($users as $user)--}}
{{--                        <option value="{{ $user->id }}"> {{ $user->name .'('. $user->email .')' }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

                <h2>Date Event:</h2>
                <input type="date" placeholder="dd/mm/yyyy" name="event_date" value="{{ $event->event_date }}"><br>

                <input class="btnSubmit" type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>

@endsection
