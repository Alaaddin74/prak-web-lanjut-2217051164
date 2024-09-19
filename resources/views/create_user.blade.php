<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body class="bg-gradient-to-r from-indigo-500">
    {{-- <h1 class="px-10 py-3 rounded-lg bg-cyan-400/20">Ini Halaman Create User</h1> --}}
    <div class="flex justify-center">  
    <form action="{{ route('user.store') }}" method="POST" class="flex flex-col items-center justify-center space-y-2 mt-11 rounded-lg shadow-inner p-20 bg-black">
        @csrf
        <label for="nama" class="font-bold tracking-wide text-white">Nama </label>
        <input type="text" id="nama" name="nama" class="border-2 rounded-lg p-1">
        <br>
        <label for="npm" class="font-bold tracking-wide text-white">NPM </label>
        <input type="text" id="npm" name="npm" class="border-2 rounded-lg p-1">
        <br>
        <label for="Kelas" class="font-bold tracking-wide text-white">Kelas</label>
        <input id="kelas" name="kelas" class="border-2 rounded-lg p-1" type="text">
        <br>
        <button class="bg-indigo-500 text-purple-100 px-4 py-1  rounded-lg font-bold">
            submit 
          </button>
        
    </form>
</div>
</body>
</html>