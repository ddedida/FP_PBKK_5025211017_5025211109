<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Season') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <a href="{{ route('show-season') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-primary-darkblue">
                <div class="px-8 py-8">
                    <form action="/create-season" method="POST" class="flex justify-between">
                        @csrf
            
                        {{-- Team Name --}}
                        <div class="flex items-center">
                            <label for="season" class="w-20">Season:</label>
                            <input type="text" id="season" name="season" class="w-96">
                        </div>
            
                        <button class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-base font-semibold rounded-md">Create Season</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>