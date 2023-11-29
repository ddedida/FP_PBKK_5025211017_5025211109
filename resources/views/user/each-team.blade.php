<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="w-full h-screen px-20 my-16 grid grid-cols-5 gap-10 justify-items-center">
        <h1>Under Construction</h1>
        <p>{{$teams->team_name}}</p>
    </div>

    @include('shared.footer')
</body>
</html>