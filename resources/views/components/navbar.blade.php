<div class="navbar flex justify-end items-center font-semibold bg-white border pr-5 pl-5">

    <a href="{{ route('homepage') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Početna</a>

    @auth


        <a href="{{ route('user', auth()->user()->id) }}" class="p-4 hover:bg-gray-200 hover:transition-all">User page</a>


        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')"
                class="p-4 hover:bg-gray-200 hover:transition-all"
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