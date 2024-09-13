<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Profile</title>
</head>

<body>
    <div class="flex justify-center">
        <div class="flex flex-col items-center justify-center space-y-6 mt-11 rounded-lg shadow-xl p-20">
            <img class="w-32 h-32 object-fill border-2 p-2 border-cyan-400 rounded-full shadow-2xl" src="{{asset('/images/photoProfile.jpg')}}" alt="">
            <div class="flex flex-col space-y-3 text-center capitalize">
                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">name: {{$nama}}</h2>
                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">kelas: {{$kelas}}</h2>
                <h2 class="px-10 py-3 rounded-lg bg-cyan-400/20">NPM: {{$npm}}</h2>
            </div>
        </div>
    </div>
</body>

</html>