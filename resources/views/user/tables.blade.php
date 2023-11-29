<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tables</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="my-16 rounded-2xl border-[1px] overflow-hidden bg-primarybw-white shadow-xl">
        <table class="w-[1125px] text-lg font-body font-medium text-primarybw-black text-center">
            <thead class="bg-primary-darkblue text-primarybw-white">
                <tr class="">
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
                    $teamname = $teamstat->team->team_name
                @endphp
                <tr class="border-t-[1px]">
                    <td class="text-center px-6 py-5">{{$loop->iteration}}</td>
                    <td class="text-left flex items-center gap-4 px-6 py-5 font-semibold">
                        <div class="w-6 h-6 flex justify-center items-center">
                            <img src="{{ asset("storage/team/$teamname.png") }}" class="max-h-6">
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
    </div>

    @include('shared.footer')
</body>
</html>