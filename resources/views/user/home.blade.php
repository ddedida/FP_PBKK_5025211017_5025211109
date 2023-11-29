<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('shared.navbarhome')

    {{-- Hero Section --}}
    <div class="w-full h-fit relative font-body">
        <img src="{{ asset("storage/league-home.jpg") }}">
        <div class="absolute inset-0 w-full h-[560px] bg-gradient-to-b from-primarybw-black to-transparent"></div>
        <div class="absolute inset-0 flex flex-col gap-6 w-fit text-right ml-auto mr-20 mt-20">
            <h1 class="text-6xl font-bold text-primary-limegreen">FOOTBALL LEAGUE</h1>
            <p class="w-[600px] text-2xl font-semibold text-primarybw-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="w-full flex justify-end">
                <a href="/tables" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-xl font-semibold rounded-md w-fit">Tables</a>
            </div>
        </div>
    </div>

    {{-- Team Section --}}
    <div class="w-full h-fit py-4 flex justify-center gap-10 bg-primarybw-white">
        @foreach ($teams as $team)
        @php
            $teamname = $team->team_name;
        @endphp
        <img src="{{ asset("storage/team/$teamname.png") }}" class="max-h-8">
        @endforeach
    </div>

    @include('shared.footer')
</body>
</html>