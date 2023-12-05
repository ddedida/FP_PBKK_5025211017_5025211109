<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6 font-body">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-6 items-center">
                    <div class="p-6 text-gray-900">
                        {{ __("Create Game Here ->") }}
                    </div>
                    <div class="flex gap-4">
                        <a href="/update-table/{{ $seasonId }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Update Table</a>
                        <a href="{{ route('create-game') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create Game</a>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-4 w-fit">
                <form action="{{ url('/game') }}" method="GET" class="flex gap-4 items-center font-body">
                    @csrf
                    <label for="season" class="text-base font-semibold text-primary-darkblue">Season:</label>
                    <select name="season" id="season">
                        @foreach ($seasons as $season)
                            <option value="{{ $season->id }}" {{ $seasonId == $season->id ? 'selected' : '' }}>
                                {{ $season->season }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Apply Filter</button>
                </form>
            </div>
            <div class="flex flex-col gap-4">
                @foreach ($games as $game)
                    @if ($game->season_id == $seasonId)
                        <div class="flex flex-col px-6 py-4 gap-2 bg-white overflow-hidden shadow-sm sm:rounded-lg text-base text-primary-darkblue">
                            @php
                                $stadium = null;
                                $city = null;
                            @endphp
                            <div class="flex justify-between">
                                <div class="flex font-semibold items-center gap-2">
                                    @foreach ($teamstats as $hometeam)
                                        @if ($game->home_teamstatistic_id == $hometeam->id)
                                            @php
                                                $teamname = $hometeam->team->team_name;
                                                $image = $hometeam->team->image;
                                            @endphp
                                            <div class="flex gap-4 items-center">
                                                <div class="w-40 flex justify-end">
                                                    <p>{{ $teamname }}</p>
                                                </div>
                                                <div class="w-6 h-6 flex justify-center items-center">
                                                    <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-6">
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
                                    @foreach ($teamstats as $awayteam)
                                        @if ($game->away_teamstatistic_id == $awayteam->id)
                                            @php
                                                $teamname = $awayteam->team->team_name;
                                                $image = $awayteam->team->image;
                                            @endphp
                                            <div class="flex gap-4 items-center">
                                                <div class="bg-primary-limegreen text-primary-darkblue w-6 flex justify-center rounded-md py-1">
                                                    @if ($game->played == 0)
                                                        <p>-</p>
                                                    @else
                                                        <p>{{$game->away_goal}}</p>
                                                    @endif
                                                </div>
                                                <div class="w-6 h-6 flex justify-center items-center">
                                                    <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-6">
                                                </div>
                                                <div class="w-40 flex justify-start">
                                                    <p>{{ $teamname }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="w-80 flex items-center text-sm gap-1">
                                    <x-map-pin></x-map-pin>
                                    <p>{{ $stadium }}, {{ $city }}</p>
                                </div>
                                <div class="flex items-center text-sm">
                                    <p>{{ date('d F Y', strtotime($game->date)) }}</p>
                                </div>
                                <div class="flex justify-end gap-2">
                                    <a href="/edit-game/{{$game->id}}" class="bg-green-500 text-primarybw-white px-3 py-2 text-sm font-semibold rounded-md">
                                        Edit
                                    </a>
                                    <form action="/delete-game/{{$game->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-primarybw-white px-3 py-2 text-sm font-semibold rounded-md">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>