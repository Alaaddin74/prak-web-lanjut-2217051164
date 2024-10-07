<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
@extends('layouts.app')

@section('content')
<div>
    <!-- Isi Section -->
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>

        <label for="npm">NPM : </label>
        <input type="text" id="npm" name="npm"><br>

        <label for="kelas">Kelas :</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>

            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>

</div>
@endsection
</html>

