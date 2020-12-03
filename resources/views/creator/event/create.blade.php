@extends('layout.main')

@section('judul', 'ADD Student')
@section('isi_utama')

    <div class="container">
        <div class="title">
            <h1>Masukkan Data</h1>
        </div>

        <div class="daftar">
            <form class="daftarform" method="POST" action="{{ route('creator.event.store') }}">
                {{ csrf_field() }}
                <h2>Title:</h2>
                <input type="text" placeholder="title here..." name="title"><br>

                <h2>Description:</h2>
                <textarea type="text" placeholder="description..." name="description"></textarea><br>

                <select name="created_by" class="custom-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name .'('. $user->email .')' }}</option>
                    @endforeach
                </select>


                <h2>Date Event:</h2>
                <input type="date" placeholder="dd/mm/yyyy" name="event_date"><br>

                <input class="btnSubmit" type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>

@endsection
