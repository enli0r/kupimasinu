<div class="navbar">

    <!-- Navbar desktop -->
    <div class="container mx-auto max-w-main flex lgMin:gap-5 justify-between items-center lg:px-5 py-3 lg:hidden lgMin:relative">

        <div class="" style="width: 270px;">
            <a href="{{ route('homepage') }}" class="flex gap-2 items-center">
                <img src="{{ asset('images/Light.png') }}" alt="" style="width: 120px;">
                {{-- <h1 class="text-lg text-whitee">KUPI MAŠINU</h1> --}}
            </a>
        </div>

        <div class="flex justify-end items-center gap-5 grow">

            @auth
                @if(auth()->user()->is_admin === 0)
                    <form action="{{ route('posts.create') }}" class="">
                        <button type="submit" class="flex gap-1 items-center bg-red-700 text-whitee justify-center uppercase rounded-xl py-2 px-5 hover:bg-red-600 hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Novi oglas
                        </button>
                    </form>
                @endif
            @endauth
                    
            @guest
                <form action="{{ route('posts.create') }}" class="">
                    <button type="submit" class="flex gap-1 items-center bg-red-700 text-whitee justify-center uppercase rounded-xl py-2 px-5 hover:bg-red-600 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Novi oglas
                    </button>
                </form>
            @endguest
                

            <div class="flex items-center gap-5">
                <a href="{{ route('homepage') }}" class="nav-link-black">Početna</a>

                <a href="{{ route('homepage') }}" class="nav-link-black">Svi oglasi</a>
            </div>
            

            <div 
            x-data="{showOstalo:false}" class="relative"
            x-on:click.away="showOstalo=false"
            id="ostalo"
            >
                <button 
                x-on:click="showOstalo = !showOstalo"
                id="ostalo"
                class="flex gap-1 justify-center items-center nav-link-black">
                    Ostalo
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>  

                <div
                    x-cloak
                    x-show="showOstalo"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-out duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute py-3 z-10 rounded-xl flex flex-col gap-3 items-center bg-black shadow-dialog" style="width: 170px; bottom: -15px; right:0px; transform:translateY(100%); color:#161A1D;"
                >
                    <div class="text-center">
                        <a href="#" class="nav-link-black">O nama</a>
                    </div>
                    
                    <div class="text-center">
                        <a href="#" class="nav-link-black">Kontakt</a>

                    </div>

                    <div class="text-center">
                        <a href="#" class="nav-link-black">Uslovi oglašavanja</a>
                    </div>
                </div>
            </div>
            


            @auth

                <div x-on:click.away="showUserDetails=false" x-data="{showUserDetails:false}">
                    <button 
                    x-on:click="showUserDetails= !showUserDetails"
                    type="submit" class="flex gap-1 items-center py-2 px-3 rounded-xl text-whitee transition-all  bg-black hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>

                        {{explode(' ', trim(auth()->user()->name))[0] }}

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    
                    <div 
                    x-cloak
                    x-show="showUserDetails"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-out duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute right-0 py-3 px-7 z-10 rounded-xl flex flex-col gap-3 items-center shadow-dialog bg-black" style="bottom: 10px; transform:translateY(100%);"
                    >
                        <div class="text-center flex flex-col gap-3">
                            <div class="text-center">
                                @if (auth()->user()->is_admin === 0)
                                    <a href="{{ route('user', auth()->user()->id) }}" class="nav-link-black">Profil</a>

                                @elseif( auth()->user()->is_admin === 1 )
                                    <a href="{{ route('admin', auth()->user()->id) }}" class="nav-link-black">Profil</a>
                                @endif
                            </div>
                        

                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link-red">Odjavite se</button>
                                </form>
                            </div>
                            
                        </div>  
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="nav-link-black">Prijava</a>
                <a href="{{ route('register') }}" class="py-2 px-3 rounded-xl text-whitee transition-all hover:text-white bg-black ">Registracija</a>
            @endguest

           

        </div>
    </div>
    <!-- -->


    <!-- Navbar phone -->
    <div 
    x-data="{showMenu:false, showBurger:true}"
    class="container mx-auto max-w-main flex justify-between items-center lgMin:hidden px-5 py-4">
        <div>
            <a href="{{ route('homepage') }}" class="flex gap-2 items-center">
                <img src="{{ asset('images/logo.png') }}" alt="" style="height: 80px;">
            </a>
        </div>
        
        <div 
        class="ml-auto flex gap-5 items-center">
            <a href="{{ route('posts.create') }}" class="bg-redd p-3 rounded-2xl text-whitee flex items-center gap-1 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-whitee">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                NOVI OGLAS
            </a>
    
            <!-- Burger -->
            <div 
            
            @click="showMenu = !showMenu; showBurger=false"
            class=""
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
            <!-- -->
        </div>
        

        <!-- NAV -->
        <div
        x-cloak
        x-show="showMenu"
        @click.away="showMenu = false; showBurger = true;"
        class="showMenu shadow-leftDialog"

        x-transition:enter="transition linear duration-200"
        x-transition:enter-start="origin-right scale-x-0 opacity-50"
        x-transition:enter-end="origin-right scale-x-100 opacity-100"
        x-transition:leave="transition linear duration-200"
        x-transition:leave-start="origin-right scale-x-100 opacity-100"
        x-transition:leave-end="origin-right scale-x-0 opacity-50"
        >
    
            <!-- X -->
            <div 
            x-cloak
            class="nav-x"
            @click="showMenu = false; showBurger=true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <!-- -->

            @auth
                @if (auth()->user()->is_admin === 0)
                    <a href="{{ route('posts.create') }}" class="flex gap-1 bg-redd text-whitee p-3 justify-center items-center mb-7">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        
                        NOVI OGLAS
                    </a>
                @endif
            @endauth
                
            @guest
                <a href="{{ route('posts.create') }}" class="flex gap-1 bg-redd text-whitee p-3 justify-center items-center mb-7">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    
                    NOVI OGLAS
                </a>
            @endguest

            

            <div class="link flex flex-col gap-5 justify-top items-center">
                


                @guest
                    <a href="{{ route('login') }}" class="nav-link-black">Prijava</a>

                    <a href="{{ route('register') }}" class="nav-link-black">Registracija</a>

                    <a href="{{ route('homepage') }}" class="nav-link-black">Početna</a>

                    <a href="{{ route('homepage') }}" class="nav-link-black">Svi oglasi</a>
                @endguest


                @auth
                    

                @if (auth()->user()->is_admin === 0)
                    <a href="{{ route('user', auth()->user()->id) }}" class="nav-link-black">Profil</a>

                @elseif( auth()->user()->is_admin === 1 )
                    <a href="{{ route('admin', auth()->user()->id) }}" class="nav-link-black">Profil</a>
                @endif

                    <a href="{{ route('homepage') }}" class="nav-link-black">Svi oglasi</a>


                @endauth

                <a href="#" class="nav-link-black">O nama</a>

                <a href="#" class="nav-link-black">Kontakt</a>

                <a href="#" class="nav-link-black">Uslovi oglašavanja</a>

                @auth
                <form action="{{ route('logout') }}" method="POST" class="logout">
                    @csrf

                    <button class="nav-link-red">Odjavite se</button>
                </form>
                @endauth

            </div>


                
            
            
                  
                




        </div>
        <!-- -->


    </div>

    
</div>