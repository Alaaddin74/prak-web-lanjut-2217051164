<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Form with Tailwind CSS</title>
</head>
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <!-- Form Section -->
    <form action="{{ route('user.store') }}" enctype="multipart/form-data" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nama">
        </div>

        <div class="mb-4">
            <label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
            <input type="text" id="npm" name="npm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan NPM">
        </div>

        <div class="mb-4">
            <label for="kelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <input type="file" id="foto" name="foto"><br>
        <label for="foto">foto:</label><br>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit
            </button>
        </div>



    </form>
</div>
@endsection
</html>
