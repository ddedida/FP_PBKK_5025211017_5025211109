<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">
            <a href="{{ route('game') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-6 text-gray-900">
                    <div class="flex flex-col gap-6">
                        <div class="flex text-sm justify-between">
                            @php
                                $homebase = null;
                                $city = null;
                            @endphp
                            @foreach ($teamstats as $hometeam)
                            @if ($games->home_teamstatistic_id == $hometeam->id)
                                    @php
                                        $homebase = $hometeam->team->homebase;
                                        $city = $hometeam->team->city;
                                    @endphp
                                @endif
                            @endforeach
                            <div class="flex justify-center items-center gap-2">
                                <x-map-pin></x-map-pin>
                                <p>{{ $homebase }}, {{ $city }}</p>
                            </div>
                            <div class="flex justify-center items-center gap-2">
                                <p>{{ date('d F Y', strtotime($games->date)) }}</p>
                            </div>
                        </div>
                        <div class="flex justify-center gap-8 text-xl font-semibold">
                            @foreach ($teamstats as $hometeam)
                                @if ($hometeam->id == $games->home_teamstatistic_id)
                                    @php
                                        $image = $hometeam->team->image;
                                    @endphp
                                    <div class="flex">
                                        <div class="flex flex-col items-center gap-4">
                                            <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-16">
                                            <div class="w-40 h-fit flex justify-center text-center">
                                                <p>{{ $hometeam->team->team_name }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="bg-primary-limegreen text-primary-darkblue w-8 flex justify-center rounded-md py-1">
                                                @if ($games->home_goal == null)
                                                    <p>-</p>
                                                @else
                                                    <p>{{ $games->home_goal }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="mt-4">
                                <p>:</p>
                            </div>
                            @foreach ($teamstats as $awayteam)
                                @if ($awayteam->id == $games->away_teamstatistic_id)
                                    @php
                                        $image = $awayteam->team->image;
                                    @endphp
                                    <div class="flex">
                                        <div class="mt-3">
                                            <div class="bg-primary-limegreen text-primary-darkblue w-8 flex justify-center rounded-md py-1">
                                                @if ($games->away_goal == null)
                                                    <p>-</p>
                                                @else
                                                    <p>{{ $games->away_goal }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center gap-4">
                                            <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-16">
                                            <div class="w-40 h-fit flex justify-center text-center">
                                                <p>{{ $awayteam->team->team_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-6">

                    {{-- Form --}}
                    <form action="/edit-game/{{$games->id}}" method="POST" class="flex justify-between items-start">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col gap-4">
                            {{-- Home Team --}}
                            <div class="flex items-center gap-2">
                                <label for="home-team" class="text-base font-semibold text-primary-darkblue w-24">Home Team:</label>
                                <select name="home-team" id="home-team">
                                    @foreach ($teamstats as $teamstat)
                                        @if ($teamstat->id == $games->home_teamstatistic_id)
                                            <option value="{{ $teamstat->id }}" selected>
                                                {{ $teamstat->team->team_name }}
                                            </option>
                                        @else
                                            <option value="{{ $teamstat->id }}">
                                                {{ $teamstat->team->team_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Home Goal --}}
                            <div class="flex items-center gap-2">
                                <label for="home-goal" class="text-base font-semibold text-primary-darkblue w-24">Home Goal:</label>
                                <input type="number" name="home-goal" id="home-goal" value="{{ $games->home_goal }}">
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            {{-- Away Team --}}
                            <div class="flex items-center gap-2">
                                <label for="away-team" class="text-base font-semibold text-primary-darkblue w-24">Away Team:</label>
                                <select name="away-team" id="away-team">
                                    @foreach ($teamstats as $teamstat)
                                        @if ($teamstat->id == $games->away_teamstatistic_id)
                                            <option value="{{ $teamstat->id }}" selected>
                                                {{ $teamstat->team->team_name }}
                                            </option>
                                        @else
                                            <option value="{{ $teamstat->id }}">
                                                {{ $teamstat->team->team_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Away Goal --}}
                            <div class="flex items-center gap-2">
                                <label for="away-goal" class="text-base font-semibold text-primary-darkblue w-24">Away Goal:</label>
                                <input type="number" name="away-goal" id="away-goal" value="{{ $games->away_goal }}">
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            {{-- Date --}}
                            <div class="flex items-center gap-2">
                                <label for="date" class="text-base font-semibold text-primary-darkblue w-16">Date:</label>
                                <input type="date" name="date" id="date" value="{{ $games->date }}">
                            </div>

                            {{-- Played --}}
                            <div class="flex items-center gap-2">
                                <label for="played" class="text-base font-semibold text-primary-darkblue w-16">Played:</label>
                                <select name="played" id="played">
                                    @if ($games->played == 1)
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    @endif
                                </select>
                            </div>
                        </div>
            
                        <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Update Game</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>