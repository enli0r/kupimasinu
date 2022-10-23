<div class="navbar  bg-white border">

    <div class="container mx-auto max-w-main flex justify-end items-center font-semibold lg:px-5">
        <a href="{{ route('homepage') }}" class="p-4 hover:bg-gray-200 hover:transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
              
        </a>

        @auth
    
            <a href="{{ route('posts.create') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Kreiraj oglas</a>


            <a href="{{ route('user', auth()->user()->id) }}" class="p-4 hover:bg-gray-200 hover:transition-all">Profil</a>
    
    
            <form method="POST" action="{{ route('logout') }}">
                @csrf
    
                <a href="route('logout')"
                    class="p-4 hover:bg-gray-200 hover:transition-all"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Odjavi se
                </a>
            </form>
        @endauth
    
        @guest
            <a href="{{ route('login') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Prijavi se</a>
    
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="p-4 hover:bg-gray-200 hover:transition-all">Registruj se</a>
            @endif
        @endguest
    </div>

    
</div>