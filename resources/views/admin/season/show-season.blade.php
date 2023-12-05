<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seasons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6 font-body">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-6 items-center">
                    <div class="p-6 text-gray-900">
                        {{ __("Create New Season ->") }}
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('create-season') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create New Season</a>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-between px-8 py-4 bg-primarybw-white shadow-sm rounded-lg">
                <form action="{{ url('/show-season') }}" method="GET" class="flex gap-4 items-center font-body">
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
                <form action="/add-team-to-season/{{ $seasonId }}" method="POST" class="flex gap-4 items-center font-body">
                    @csrf
                    <label for="team_id">Team:</label>
                    <select name="team_id" id="team_id">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->team_name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Add Team</button>
                </form>
            </div>
            <div class="w-full h-fit">
                @if($seasonId)
                    <table class="w-full text-lg font-body font-medium bg-primarybw-white text-primary-darkblue text-center overflow-hidden rounded-lg shadow-sm">
                        <thead class="bg-primary-darkblue text-primarybw-white">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Pos</th>
                                <th class="w-72 px-6 py-4 text-left font-semibold">Team</th>
                                <th class="px-6 py-4 font-semibold">Played</th>
                                <th class="px-6 py-4 font-semibold">Win</th>
                                <th class="px-6 py-4 font-semibold">Draw</th>
                                <th class="px-6 py-4 font-semibold">Lose</th>
                                <th class="px-6 py-4 font-semibold">GF</th>
                                <th class="px-6 py-4 font-semibold">GA</th>
                                <th class="px-6 py-4 font-semibold">GD</th>
                                <th class="px-6 py-4 font-semibold">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamstats as $teamstat)
                            @php
                                $teamname = $teamstat->team->team_name;
                                $image = $teamstat->team->image;
                            @endphp
                            <tr class="border-t-[1px]">
                                <td class="text-center px-6 py-5">{{$loop->iteration}}</td>
                                <td class="text-left flex items-center gap-4 px-6 py-5 font-semibold">
                                    <div class="w-6 h-6 flex justify-center items-center">
                                        <img src="{{ asset("storage/team-logo/$image") }}" class="max-h-6">
                                    </div>
                                    {{$teamname}}
                                </td>
                                <td class="px-6 py-5">{{$teamstat->played}}</td>
                                <td class="px-6 py-5">{{$teamstat->win}}</td>
                                <td class="px-6 py-5">{{$teamstat->draw}}</td>
                                <td class="px-6 py-5">{{$teamstat->lose}}</td>
                                <td class="px-6 py-5">{{$teamstat->goal_for}}</td>
                                <td class="px-6 py-5">{{$teamstat->goal_againts}}</td>
                                <td class="px-6 py-5">{{$teamstat->goal_diff}}</td>
                                <td class="px-6 py-5">{{$teamstat->points}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>