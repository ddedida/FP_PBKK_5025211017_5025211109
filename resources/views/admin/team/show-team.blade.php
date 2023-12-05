<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6 font-body">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-6 items-center">
                    <div class="p-6 text-gray-900">
                        {{ __("Create New Team ->") }}
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('create-team') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create Team</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                @foreach($teams as $team)
                    <div class="w-full h-16 px-6 flex items-center justify-center bg-primarybw-white rounded-lg shadow-sm overflow-hidden">
                        <div class="w-full pl-8 flex items-center">
                            <div class="flex items-center text-center gap-10">
                                <div class="w-8 h-6 flex justify-center">
                                    <img src="{{ asset("storage/team-logo/$team->image") }}" class="h-full">
                                </div>
                                <h2 class="w-80 font-body font-semibold text-lg text-primary-darkblue text-left">{{ $team->team_name }}</h2>
                            </div>
                            <div>
                                <p class="font-body text-base text-primary-darkblue">{{ $team->homebase }}, {{ $team->city }}</p>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="/edit-team/{{$team->id}}" class="bg-green-500 text-primarybw-white px-3 py-2 text-sm font-semibold rounded-md">
                                Edit
                            </a>
                            <form action="/delete-team/{{$team->id}}" method="POST">
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