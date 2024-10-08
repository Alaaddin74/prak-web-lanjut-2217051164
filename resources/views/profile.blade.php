<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{
asset('assets') }}">
    <title>Profile</title>
</head>

<body>
    <div class="flex justify-center">
        <div class="flex flex-col items-center justify-center space-y-6 mt-11 rounded-lg shadow-xl p-20">
            <img  class="w-32 h-32 object-fill border-2 p-2 border-cyan-400 rounded-full shadow-2xl" src="{{ $user->foto }}" alt="photo profile">
            <div class="flex flex-col space-y-3 text-center capitalize">
                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">name: {{$user->nama}}</h2>

                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">NPM: {{$user->npm}}</h2>
                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">kelas: {{$user->nama_kelas?? 'kelas tidak ditemukan'}}</h2>
            </div>
            {{-- <img class="" src="{{ $user->foto }}" alt="photo profile"> --}}

        </div>
    </div>
</body>

</html>
