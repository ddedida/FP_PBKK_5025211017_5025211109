<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management Player') }}
        </h2>
    </x-slot>

    @if(session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success!</span> {{ session('success') }}.
      </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6 font-body">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-6 items-center">
                    <div class="p-6 text-gray-900">
                        {{ __("Manage Player ->") }}
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('player.index') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Update Player</a>
                        <a href="{{ route('player.create') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Assign New Player</a>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-4 w-fit">
                <form action="{{ url('/player') }}" method="GET" class="flex gap-4 items-center font-body">
                    @csrf
                    <label for="season" class="text-base font-semibold text-primary-darkblue">Season:</label>
                    <select name="season" id="season">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ $teamId == $team->id ? 'selected' : '' }}>
                                {{ $team->team_name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Apply Filter</button>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                @foreach($players as $player)
                    <div class="flex justify-between px-6 py-4 items-center border-b">
                        <div class="w-80 flex text-gray-900">
                            {{ ($player->player_name) }}
                        </div>
                        <div class="w-10 text-gray-900">
                            {{ ($player->position->position) }}
                        </div>
                        <div class="w-44 text-gray-900 flex gap-2 items-center">
                            <div class="w-10 h-5 flex justify-center items-center">
                                @php
                                    $image = $player->team->image;
                                @endphp
                                <img src="{{ asset("storage/team-logo/$image") }}" class="h-full">
                            </div>
                            {{ ($player->team->team_name) }}
                        </div>
                        <div class="w-60 text-gray-900">
                            {{ ($player->country->country_name) }}
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="/player/{{ $player->id }}/edit" class="bg-green-500 text-primarybw-white px-3 py-2 text-sm font-semibold rounded-md">
                                Edit
                            </a>
                            <form action="/player/{{$player->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-primarybw-white px-3 py-2 text-sm font-semibold rounded-md">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>