<nav class="w-full h-fit px-24 py-4 font-body bg-primary-limegreen shadow-xl">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-16">
            <img src="{{ asset("storage/league-logo.png") }}" class="max-h-16">
            <div class="flex gap-12 text-primary-darkblue">
                <a href="/" class="text-xl font-medium">Home</a>
                <a href="/tables" class="text-xl font-medium">Tables</a>
                <a href="/results" class="text-xl font-medium">Results</a>
                <a href="/fixtures" class="text-xl font-medium">Fixtures</a>
                <a href="/teams" class="text-xl font-medium">Teams</a>
            </div>
        </div>
        <div class="flex gap-4 items-center">
            @auth
                <p class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-xl font-semibold rounded-md">Hello, {{Auth::user()->name}}</p>
                @if (Auth::user()->is_admin)
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-primary-darkblue border-2 border-primary-darkblue px-4 py-2 text-xl font-semibold rounded-md">
                            Log Out
                        </a>
                    </form>
                    <a href="{{ url('/dashboard') }}" class="bg-primarybw-white text-primary-darkblue px-4 py-2 text-xl font-semibold rounded-md">Dashboard</a>   
                @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-primary-darkblue border-2 border-primary-darkblue px-4 py-2 text-xl font-semibold rounded-md">
                        Log Out
                    </a>
                </form>
                @endif
            @else
                <a href="{{ route('login') }}" class="bg-primary-darkblue text-primarybw-white px-4 py-2 text-xl font-semibold rounded-md">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-primary-darkblue border-2 border-primary-darkblue px-4 py-2 text-xl font-semibold rounded-md">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>