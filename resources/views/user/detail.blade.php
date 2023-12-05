<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="icon" href="{{ asset("storage/league-logo.png")}}" />
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="w-[1040px] min-h-screen flex flex-col gap-4 my-8">
        <a href="{{ route('results') }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
            Back
        </a>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
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
        <div class="w-full flex justify-end">
            <a href="/comment/{{ $games->id }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
                Add Comment
            </a>
        </div>

        <div class="flex flex-col gap-4">
            @foreach ($comments as $comment)
                <div class="bg-primarybw-white w-full p-8 rounded-md shadow-sm flex flex-col gap-4">
                    <div class="flex gap-2 items-center text-sm text-primary-darkblue">
                        <img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">
                        <p class="font-semibold">{{ $comment->user->name }} - </p>
                        <p><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $comment->created_at }}</time></p>
                    </div>
                    <p class="text-primary-darkblue">{{ $comment->excerpt }}.</p>
                    <div class="flex gap-4 items-center">
                        <a href="/comment/{{ $comment->id }}/edit" class="flex items-center text-sm text-primarybw-icon hover:underline  font-medium">Edit</a>
                        <div>
                            <form action="/comment/{{$comment->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center text-sm text-primarybw-icon hover:underline font-medium">Remove</button> 
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('shared.footer')
</body>
</html>