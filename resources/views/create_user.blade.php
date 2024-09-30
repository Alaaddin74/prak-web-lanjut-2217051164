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
        {{-- Display error message for 'nama' --}}
        @foreach ($errors->get('nama') as $msg)
            <p class="text-red-600">{{ $msg }}</p>
        @endforeach
        <br>
        <label for="npm" class="font-bold tracking-wide text-white">NPM </label>
        <input type="text" id="npm" name="npm" class="border-2 rounded-lg p-1">
        {{-- Display error message for 'npm' (if applicable) --}}
        @foreach ($errors->get('npm') as $msg)
            <p class="text-red-600">{{ $msg }}</p>
        @endforeach
        <br>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        <button class="bg-indigo-500 text-purple-100 px-4 py-1  rounded-lg font-bold">
            Submit
        </button>
    </form>
</div>
</body>
</html>

