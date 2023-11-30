<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <a href="{{ route('game') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-10 py-4">
                    <form action="/create-game" method="POST" class="flex justify-between items-center">
                        @csrf
            
                        {{-- Home Team --}}
                        <div class="flex items-center gap-2">
                            <label for="home-team" class="text-base font-semibold text-primary-darkblue">Home Team:</label>
                            <select name="home-team" id="home-team">
                                @foreach ($teamstats as $teamstat)
                                    <option value="{{ $teamstat->id }}">
                                        {{ $teamstat->team->team_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        {{-- Away Team --}}
                        <div class="flex items-center gap-2">
                            <label for="away-team" class="text-base font-semibold text-primary-darkblue">Away Team:</label>
                            <select name="away-team" id="away-team">
                                @foreach ($teamstats as $teamstat)
                                    <option value="{{ $teamstat->id }}">
                                        {{ $teamstat->team->team_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        {{-- Date --}}
                        <div class="flex items-center gap-2">
                            <label for="date" class="text-base font-semibold text-primary-darkblue">Date:</label>
                        <input type="date" name="date" id="date">
                        </div>
            
                        <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create Game</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>