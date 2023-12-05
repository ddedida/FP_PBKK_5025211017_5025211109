<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <a href="{{ route('show-team') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-primary-darkblue">
                <div class="px-8 py-8">
                    <form action="/create-team" method="POST" class="flex flex-col gap-4" enctype="multipart/form-data">
                        @csrf
            
                        {{-- Team Name --}}
                        <div class="flex items-center">
                            <label for="team_name" class="w-32">Team Name:</label>
                            <input type="text" id="team_name" name="team_name" class="w-96">
                        </div>

                        {{-- Homebase --}}
                        <div class="flex items-center">
                            <label for="homebase" class="w-32">Homebase:</label>
                            <input type="text" id="homebase" name="homebase" class="w-96">
                        </div>

                        {{-- City --}}
                        <div class="flex items-center">
                            <label for="city" class="w-32">City:</label>
                            <input type="text" id="city" name="city" class="w-96">
                        </div>

                        {{-- Team Logo --}}
                        <div class="flex items-center mb-4">
                            <label for="image" class="w-32">Team Logo:</label>
                            <input type="file" id="image" name="image">
                        </div>
            
                        <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create Team</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>