<x-app-layout>
    <div class="pocetna">
        <header>
            <h1 class="dobrodosli">Dobrodošli na</h1>
            <h1 class="km-text">KupiMasinu.com</h1>
            <p>Najpouzdaniji sajt za prodaju mašina u Srbiji. U našem virtuelnom skladištu možete pronaći mašine različitih vrsta i namena.</p>
        </header>


        <div class="bg-redd rounded-2xl h-2 w-32 my-6 mx-auto"></div>

        <section class="pocetna-body">
            <div class="categories-container">    
                <div class="homepage-categories"> 
                    <a class="sve-masine" href="{{ route('homepage') }}">Sve mašine</a>
    
                    <div class="row-1">
                        <a class="category" href="{{ route('homepage', ['tip' => 'masina za drvo']) }}">Mašine za drvo</a>
                        <a class="category" href="{{ route('homepage', ['tip' => 'masina za metal']) }}">Mašine za metal</a> 
                    </div>
                        
                    <div class="row-2">
                        <a class="category" href="{{ route('homepage', ['tip' => 'masina za plastiku']) }}">Mašine za plastiku</a>
                        <a class="category" href="{{ route('homepage', ['tip' => 'radna masina']) }}">Radne mašine</a>    
                    </div>        
                </div>
            </div>

            <div class="bg-redd rounded-2xl h-2 w-32 mx-auto mdMin:hidden"></div>

            
            @guest
                <div class="body-right-guest">
                    <h1>Prijava / Registracija</h1>
                    <p>Prijavite kako biste mogli da kreirate nove oglase i primate obaveštenja o novim oglasima na vašoj email adresi.</p>  
                    <div class="linkovi">
                        <a href="{{ route('login') }}" class="nav-link-black">Prijava</a>
                        <a href="{{ route('register') }}" class="register">Registracija</a>
                    </div>  
                    
                    <a href="{{ route('posts.create') }}" class="novi-oglas">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        
                        Kreiraj novi oglas
                    </a>
                </div>
            @endguest

            @auth
                <div class="body-right-auth">
                    <h2>Prijavljeni ste kao</h2>
                    <h1>{{ auth()->user()->name }}</h1>

                    <p>Istražite nove oglase ili kreirajte svoj klikom na dugme ispod.</p>

                    <div class="linkovi">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
        
                            <button class="nav-link-red">Odjavite se</button>
                        </form>

                        <a href="{{ route('user', auth()->user()->id) }}" class="profil">Profil</a>
                    </div>
                    
                    <a href="{{ route('posts.create') }}" class="novi-oglas">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        
                        Kreiraj novi oglas
                    </a>
                </div>        
        
            @endauth
            
            
        </section>
        
        
    </div>
</x-app-layout>