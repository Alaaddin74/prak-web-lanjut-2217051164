@extends('layouts.app')

@section('content')
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            {{-- <img src="#" class="h-8" alt="Flowbite Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">List of Users</span>
        </a>
    </div>
</nav>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
    @foreach ($kelas as $user)
    <div class="bg-white shadow-md rounded-lg overflow-hidden dark:bg-gray-800">
        <img class="w-full h-32 sm:h-48 object-cover" src="{{ $user->foto }}">
        <div class="p-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->nama }}</h2>
            <p class="text-gray-600 dark:text-gray-400">NPM: {{ $user->npm }}</p>
            <p class="text-gray-600 dark:text-gray-400">Kelas: {{ $user->nama_kelas }}</p>
            <p class="text-gray-600 dark:text-gray-400">Jurusan: {{ $user->jurusan }}</p>
            <p class="text-gray-600 dark:text-gray-400">Semester: {{ $user->semester }}</p>

            <div class="mt-4">
                <!-- Details -->
                <a href="{{ route('user.show', $user->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Details
                </a>
                <!-- Edit -->
                <a href="{{ route('user.edit', $user->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Edit
                </a>
                <!-- Delete -->
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700" onclick="return confirm('Apakah Anda Yakin ingin menghapus user ini?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
