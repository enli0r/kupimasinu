<div class="navbar">

    <!-- Navbar desktop -->
    <div class="container mx-auto max-w-main flex lgMin:gap-5 justify-between items-center lg:px-5 py-4 lg:hidden lgMin:relative">

        <div class="" style="width: 270px;">
            <a href="{{ route('homepage') }}" class="flex gap-2 items-center">
                <img src="https://cdn.pixabay.com/photo/2014/04/02/11/16/cog-305746_1280.png" alt="" class="w-8 h-8">
                <span class="text-lg font-semibold text-gray-700">KUPI MAŠINU</span>
            </a>
        </div>

        <div class="flex justify-end items-center gap-5 grow">

            <button class="flex gap-1 items-center bg-red-700 text-whitee justify-center uppercase rounded-xl py-2 px-5 mr-auto hover:bg-red-600 hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Novi oglas
            </button>

            <div class="flex items-center gap-5">
                <a href="{{ route('homepage') }}" class="nav-link">Početna</a>

                <a href="{{ route('homepage') }}" class="nav-link">Svi oglasi</a>
            </div>
            

            <div 
            x-data="{showOstalo:false}" class="relative"
            x-on:click.away="showOstalo=false"
            >
                <button 
                x-on:click="showOstalo = !showOstalo"
                class="flex gap-1 justify-center items-center">
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
                    class="absolute py-3 z-10 rounded-xl flex flex-col gap-3 items-center hover:text-black bg-white shadow-dialog" style="width: 170px; bottom: -15px; right:0px; transform:translateY(100%); color:#161A1D;"
                >
                    <div class="nav-links text-center space-y-3">
                        <a href="#" class="">O nama</a>

                        <a href="#" class="">Tehnička podrška</a>

                        <a href="#" class="">Uslovi oglašavanja</a>
                    </div>
                
                </div>
            </div>
            


            @auth

                <div x-on:click.away="showUserDetails=false" x-data="{showUserDetails:false}">
                    <button 
                    x-on:click="showUserDetails= !showUserDetails"
                    type="submit" class="flex gap-1 items-center py-2 px-3 rounded-xl text-whitee transition-all bg-dark-gray hover:bg-black hover:text-white">
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
                    class="absolute right-0 py-3 px-7 z-10 rounded-xl flex flex-col gap-3 items-center shadow-dialog bg-dark-gray hover:bg-black" style="bottom: 10px; transform:translateY(100%);"
                    >
                        <div class="text-center flex flex-col gap-3">
                            <div class="text-center">
                                <a href="{{ route('user', auth()->user()->id) }}" class="nav-link-black">Profil</a>
                            </div>
                            
                            <div class="text-center">
                                <a href="#" class="nav-link-black">Moji oglasi</a>
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
                <a href="{{ route('login') }}" class="nav-link">Prijava</a>
                <a href="{{ route('register') }}" class="py-2 px-3 rounded-xl text-whitee transition-all hover:text-white hover:bg-black bg-dark-gray">Registracija</a>
            @endguest

        </div>
    </div>
    <!-- -->


    <!-- Navbar phone -->
    <div 
    x-data="{showMenu:false, showBurger:true}"
    class="container mx-auto max-w-main flex justify-between items-center lgMin:hidden px-5 py-3">
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