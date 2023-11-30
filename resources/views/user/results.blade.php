<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="w-full h-screen px-24">
        <div class="my-16 flex flex-col gap-4">
            @foreach ($games as $game)
                @if ($game->played == 1)
                    <div class="w-full flex flex-col px-6 py-4 gap-2 bg-white overflow-hidden shadow-sm sm:rounded-lg text-xl text-primary-darkblue">
                        @php
                            $stadium = null;
                            $city = null;
                        @endphp
                        <div class="flex justify-between">
                            <div class="flex font-semibold items-center gap-2">
                                @foreach ($teams as $hometeam)
                                    @if ($game->home_teamstatistic_id == $hometeam->team_id)
                                        @php
                                            $teamname = $hometeam->team->team_name
                                        @endphp
                                        <div class="flex gap-4 items-center">
                                            <div class="w-48 flex justify-end">
                                                <p>{{ $teamname }}</p>
                                            </div>
                                            <div class="w-8 h-8 flex justify-center items-center">
                                                <img src="{{ asset("storage/team/$teamname.png") }}" class="max-h-8">
                                            </div>
                                            <div class="bg-primary-limegreen text-primary-darkblue w-6 flex justify-center rounded-md py-1">
                                                @if ($game->played == 0)
                                                    <p>-</p>
                                                @else
                                                    <p>{{$game->home_goal}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $stadium = $hometeam->team->homebase;
                                            $city = $hometeam->team->city;
                                        @endphp
                                    @endif
                                @endforeach
                                <div>
                                    <p>:</p>
                                </div>
                                @foreach ($teams as $awayteam)
                                    @if ($game->away_teamstatistic_id == $awayteam->id)
                                        <div class="flex gap-4 items-center">
                                            @php
                                                $teamname = $awayteam->team->team_name
                                            @endphp
                                            <div class="bg-primary-limegreen text-primary-darkblue w-6 flex justify-center rounded-md py-1">
                                                @if ($game->played == 0)
                                                    <p>-</p>
                                                @else
                                                    <p>{{$game->away_goal}}</p>
                                                @endif
                                            </div>
                                            <div class="w-8 h-8 flex justify-center items-center">
                                                <img src="{{ asset("storage/team/$teamname.png") }}" class="max-h-8">
                                            </div>
                                            <div class="w-48 flex justify-start">
                                                <p>{{ $teamname }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="w-80 flex items-center text-base gap-1">
                                <x-map-pin></x-map-pin>
                                <p>{{ $stadium }}, {{ $city }}</p>
                            </div>
                            <div class="flex items-center text-base">
                                <p>{{ date('d F Y', strtotime($game->date)) }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    @include('shared.footer')
</body>
</html>