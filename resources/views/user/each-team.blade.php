<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams</title>
    <link rel="icon" href="{{ asset("storage/league-logo.png")}}" />
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="w-full min-h-screen px-40 my-16 justify-items-center flex flex-col gap-6">
        <a href="{{ route('teams') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
            Back
        </a>
        <div class="bg-primarybw-white flex flex-col p-8 gap-2 shadow-sm rounded-md">
            <h1 class="font-body font-bold text-2xl text-primary-darkblue">{{$teams->team_name}}</h1>
            <div>
                <img src="{{ asset("storage/team-logo/$teams->image") }}" class="max-h-24">
            </div>
            <div class="flex items-center">
                <p class="font-body font-bold text-lg text-primary-darkblue w-32">Homebase:</p>
                <p>{{ $teams->homebase }}</p>   
            </div>
            <div class="flex items-center">
                <p class="font-body font-bold text-lg text-primary-darkblue w-32">City:</p>
                <p>{{ $teams->city }}</p>
            </div>
        </div>

        <h1 class="font-body font-bold text-lg text-primary-darkblue">Coach</h1>
        <div class="bg-primarybw-white overflow-hidden shadow-sm rounded-md">
            <div class="flex justify-between px-6 py-4 items-center border-b">
                @foreach ($coaches as $coach)
                    <div class="w-80 flex text-gray-900">
                        {{ ($coach->coach_name) }}
                    </div>
                    <div class="w-80 flex text-gray-900">
                        {{ ($coach->country->country_name) }}
                    </div>
                @endforeach
            </div>
        </div>

        <h1 class="font-body font-bold text-lg text-primary-darkblue">Players</h1>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
            @foreach($players as $player)
                <div class="flex justify-between px-6 py-4 items-center border-b">
                    <div class="w-80 flex text-gray-900">
                        {{ ($player->player_name) }}
                    </div>
                    <div class="w-10 text-gray-900">
                        {{ ($player->position->position) }}
                    </div>
                    <div class="w-20 text-gray-900">
                        <p>{{ ($player->height) }} cm</p>
                    </div>
                    <div class="w-40 text-gray-900">
                        {{ date('d F Y', strtotime($player->date_of_birth)) }}
                    </div>
                    <div class="w-60 text-gray-900">
                        {{ ($player->country->country_name) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('shared.footer')
</body>
</html>