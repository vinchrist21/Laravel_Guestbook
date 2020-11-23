{{--@extends('layout.main')--}}
@extends('layouts.app')

@section('judul', 'HOME')
@section('content')
    <div class="container">
        <div class="title">
            <h1>List Data</h1>
        </div>
        <div class="row">
            @auth()
                <div class="col-md-2 offset-md-10">
                    <a href="{{ route('event.create') }}" class="btn btn-primary btn-block" role="button"
                       aria-pressed="true">ADD</a>
                </div>
            @endauth
        </div>
        <hr>

        <table id="list" style="width: 100%">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Owned By</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>

            @foreach($events as $event)
                <tr>
                    <td> <a @auth() href="{{ route('event.edit', $event) }}@endauth">{{ $event->title }}</a> </td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->status }}</td>
                    <td>{{ $event->creator->name }}</td>
                    <td>{{ $event->updated_at }}</td>
                    <td>{{ $event->created_at }}</td>
                    @auth()
                        <td>
                            <form action="{{ route('event.destroy', $event) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach

        </table>
    </div>
@endsection
