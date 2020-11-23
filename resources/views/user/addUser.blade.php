@extends('layout.main')

@section('judul', 'ADD Student')
@section('isi_utama')

    <div class="container">
        <div class="title">
            <h1>Masukkan Data</h1>
        </div>

        <div class="daftar">
            <form class="daftarform" method="POST" action="{{ route('admin.user.store') }}">
                {{ csrf_field() }}
                <h2>Name User:</h2>
                <input type="text" name="name"><br>

                <h2>Description:</h2>
                <textarea type="text" name="description"></textarea><br>

                <h2>Email:</h2>
                <input type="email" name="email"><br>

                <input class="btnSubmit" type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>

@endsection
