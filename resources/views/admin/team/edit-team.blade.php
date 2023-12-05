<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">
            <a href="{{ route('show-team') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="/edit-team/{{$teams->id}}" method="POST" class="flex flex-col gap-4 text-primary-darkblue px-10 py-6" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center">
                        <label for="team_name" class="w-32">Team Name:</label>
                        <input type="text" id="team_name" name="team_name" value="{{ $teams->team_name }}" class="w-96">
                    </div>

                    <div class="flex items-center">
                        <label for="homebase" class="w-32">Homebase:</label>
                        <input type="text" id="homebase" name="homebase" value="{{ $teams->homebase }}" class="w-96">
                    </div>

                    <div class="flex items-center">
                        <label for="city" class="w-32">City:</label>
                        <input type="text" id="city" name="city" value="{{ $teams->city }}" class="w-96">
                    </div>

                    <div class="flex">
                        <p class="w-32">Current Logo:</p>
                        <img src="{{ asset("storage/team-logo/$teams->image") }}" class="w-32">
                    </div>

                    <div class="flex">
                        <label for="image" class="w-32">New Logo: (optional)</label>
                        <input type="file" id="image" name="image">
                    </div>

                    <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Update Team</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>