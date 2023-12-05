<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment</title>
    <link rel="icon" href="{{ asset("storage/league-logo.png")}}" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="flex flex-col gap-8 w-full min-h-screen px-24 my-8">

        <a href="/detail/{{ $game->id }}" class="bg-primary-limegreen text-primary-darkblue px-4 py-2 text-base font-semibold rounded-md w-fit">
            Back
        </a>

        <form method="post" action="/comment/{{ $game->id }}" class="flex flex-col gap-4">
            @csrf
            <div class="col-span-full flex flex-col gap-4">
                <label for="body" class="block text-xl font-semibold leading-6 text-gray-900">Comment</label>
                <div class="mt-2">
                  <textarea id="body" name="body" rows="3" class="px-6 py-4 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-400 sm:text-sm sm:leading-6" placeholder="Write a comment..."></textarea>
                </div>  
            </div>
            <button type="submit" class="mt-2 inline-flex items-center py-2.5 px-4 text-base font-semibold text-center text-white bg-lime-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Post comment
            </button>
        </form>
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