<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full flex items-center flex-col bg-primarybw-light">
    @include('shared.navbarhome')

    <div class="w-full h-screen px-24">
        <div class="my-16 flex flex-col gap-4">
            <form method="post" action="/comment/{{ $target->id }}">
                @csrf
                @method('put')
                <div class="col-span-full">
                    <label for="body" class="block text-xl font-semibold leading-6 text-gray-900">Comment</label>
                    <div class="mt-2">
                      <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-400 sm:text-sm sm:leading-6 ">
                    </textarea>
                    </div>
                </div>
                <button type="submit"
                class="mt-2 inline-flex items-center py-2.5 px-4 text-base font-semibold text-center text-white bg-lime-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Edit comment
                </button>
            </form>
        
              <div></div>
        </div>
    </div>

    
</body>
</html>