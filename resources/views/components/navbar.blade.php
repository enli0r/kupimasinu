<div class="navbar flex justify-end font-semibold bg-white border">

    <a href="{{ route('homepage') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Početna</a>

    @auth

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
        <a href="{{ route('login') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Register</a>
        @endif
    @endguest
</div>