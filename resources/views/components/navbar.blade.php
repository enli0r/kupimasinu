<div class="navbar">

    <div class="container mx-auto max-w-main flex justify-between items-center font-semibold lg:px-5 py-4 md:hidden">

        <div>
            <a href="{{ route('homepage') }}" class="flex gap-2 items-center">
                <img src="https://cdn.pixabay.com/photo/2014/04/02/11/16/cog-305746_1280.png" alt="" class="w-8 h-8">
                <span class="text-lg font-semibold text-gray-700">KUPI MAŠINU</span>
            </a>
        </div>

        <div class="flex justify-between items-center gap-5 text-gray-700">
            {{-- <a href="{{ route('homepage') }}" class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                  
            </a> --}}
    
            @auth

                {{-- <div class="flex justify-center items-center gap-1 hover:cursor-pointer">
                    <p class="text-white">{{ explode(' ', trim(auth()->user()->name))[0] }}</p>

                    <img src="https://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" alt="" class="w-8 h-8">
                      
                </div> --}}

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                  
              

        
                {{-- <a href="{{ route('posts.create') }}" class="hover:transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                      
                    Novi oglas
                </a>
    
    
                <a href="{{ route('user', auth()->user()->id) }}" class="hover:transition-all">Profil</a>
        
        
                <form method="POST" action="{{ route('logout') }}" class="">
                    @csrf
        
                    <a href="route('logout')"
                        class="hover:transition-all"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Odjavi se
                    </a>
                </form> --}}
            @endauth
        
            @guest
                <a href="{{ route('login') }}" class="hover:transition-all">Prijava</a>
        
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:transition-all">Registracija</a>
                @endif
            @endguest
        </div>

        
    </div>


    <!-- Navbar phone -->
    <div 
    x-data="{showMenu:false, showBurger:true}"
    class="container mx-auto max-w-main flex justify-between items-center mdMin:hidden px-5 py-3">
        <div>
            <a href="{{ route('homepage') }}" class="flex gap-2 items-center">
                <img src="https://cdn.pixabay.com/photo/2014/04/02/11/16/cog-305746_1280.png" alt="" class="w-8 h-8">
                <span class="text-lg font-semibold text-gray-700">KUPI MAŠINU</span>
            </a>
        </div>
          

        <!-- Burger -->
        <div 
        x-show="showBurger"
        @click="showMenu = !showMenu; showBurger=false"
        class="ml-auto"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        <!-- -->

        <!-- NAV -->
        <div
        x-cloak
        x-show="showMenu"
        @click.away="showMenu = false; showBurger = true;"
        class="showMenu shadow-leftDialog"

        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="origin-right scale-x-0 opacity-50"
        x-transition:enter-end="origin-right scale-x-100 opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="origin-right scale-x-100 opacity-100"
        x-transition:leave-end="origin-right scale-x-0 opacity-50"
        >
    
            <!-- X -->
            <div 
            x-cloak
            class="nav-x"
            x-show="showMenu"
            @click="showMenu = false; showBurger=true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <!-- -->

            <a href="{{ route('posts.create') }}" class="flex gap-1 bg-redd text-whitee p-3 justify-center items-center mb-7">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                  
                NOVI OGLAS
            </a>

            <div class="link flex flex-col gap-5 justify-top items-center">
                


                @guest
                    <a href="{{ route('login') }}">Prijava</a>

                    <a href="{{ route('register') }}">Registracija</a>

                    <a href="{{ route('homepage') }}">Početna</a>

                    <a href="{{ route('homepage') }}">Svi oglasi</a>
                @endguest


                @auth
                    <a href="{{ route('user', auth()->user()->id) }}">{{explode(' ', trim(auth()->user()->name))[0] }}</a>

                    <a href="{{ route('homepage') }}">Početna</a>

                    <a href="{{ route('homepage') }}">Svi oglasi</a>

                    <a href="#">Moji oglasi</a>

                @endauth

                <a href="#">O nama</a>

                <a href="#">Tehnička podrška</a>

                <a href="#">Uslovi oglašavanja</a>

                @auth
                <form action="{{ route('logout') }}" method="POST" class="logout">
                    @csrf

                    <button>Odjava</button>
                </form>
                @endauth

            </div>


                
            
            
                  
                




        </div>
        <!-- -->


    </div>

    
</div>