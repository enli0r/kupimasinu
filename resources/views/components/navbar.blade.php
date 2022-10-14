<div class="navbar p-4 flex justify-end font-semibold gap-4">
    @auth
        <a href="{{ route('homepage') }}">Pocetna</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Log out
            </a>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="hover:underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="hover:underline">Register</a>
        @endif
    @endguest
</div>