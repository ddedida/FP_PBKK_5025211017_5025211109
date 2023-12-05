<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit or Transfer Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6 font-body">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="/player/{{ $player->id }}"> 
                @method('put')
                    @csrf

                    <div class="mt-3 mb-5 mx-5 sm:col-span-2">
                        <label for="player_name" class="block mb-2 text-base font-semibold text-primary-darkblue">Player Name:</label>
                        <input type="text" name="player_name" id="player_name" class="bg-gray-50 border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-primary-darkblue dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('player_name') border-red-500 @enderror" placeholder="Type player name" required="" value="{{ old('player_name', $player->player_name) }}">
                        @error('player_name')
                        <div class="text-sm font-thin text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="ml-5 sm:col-span-3">
                            <label for="team" class="text-base font-semibold text-primary-darkblue">Team</label>
                            <select name="team_id" id="team">
                                @foreach ($teams as $team)
                                    @if(old('team_id', $player->team_id) == $team->id)
                                    <option value="{{ $team->id }}" selected>
                                        {{ $team->team_name }}
                                    </option>
                                    @else
                                    <option value="{{ $team->id }}">
                                        {{ $team->team_name }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                
                        <div class="mr-5 sm:col-span-3">
                            <label for="country" class="text-base font-semibold text-primary-darkblue">Country</label>
                            <select name="country_id" id="country">
                                @foreach ($countries as $country)
                                    @if(old('country_id', $player->country_id) == $country->id)
                                    <option value="{{ $country->id }}" selected>
                                        {{ $country->country_name }}
                                    </option>
                                    @else
                                    <option value="{{ $country->id }}">
                                        {{ $country->country_name }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pb-12 mx-5">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            
                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="height" class="block text-base font-semibold leading-6 text-primary-darkblue">Height</label>
                                <div class="mt-2">
                                  <input type="text" name="height" id="height" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('height', $player->height) }}">
                                </div>
                                @error('height')
                                    <div class="text-sm font-thin text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="position" class="text-base font-semibold text-primary-darkblue">Position</label>
                                <div>
                                    <select name="position_id" id="position">
                                        @foreach ($positions as $position)
                                            @if(old('position_id', $player->position_id) == $position->id)
                                            <option value="{{ $position->id }}" selected>
                                                {{ $position->position}}
                                            </option>
                                            @else
                                            <option value="{{ $position->id }}">
                                                {{ $position->position}}
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                      
                              <div class="sm:col-span-2">
                                <label for="date_of_birth" class="block text-base font-semibold leading-6 text-primary-darkblue">Date of Birth</label>
                                <div class="gap-2">
                                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $player->date_of_birth) }}">
                                </div>
                                @error('date_of_birth')
                                    <div class="text-sm font-thin text-red-500">{{ $message }}</div>
                                @enderror
                              </div>
                        </div>

                        <div class="mt-10">
                            <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Update Player</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>



