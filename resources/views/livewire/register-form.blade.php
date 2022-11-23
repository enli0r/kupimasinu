<div>
    <div class="flex justify-center mb-5">
        @if ($korisnik === 'fizicko lice')
            <button wire:click="setUserType('fizicko lice')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">Fizičko lice</button> 
        @else
            <button wire:click="setUserType('fizicko lice')" class="pb-2 px-3 border-b-4 font-semibold text-md border-gray-400 text-gray-400 hover:text-dark-gray transition-all hover:border-dark-gray">Fizičko lice</button>
        @endif
        
        @if ($korisnik === 'pravno lice')
            <button wire:click="setUserType('pravno lice')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">Pravno lice</button> 
        @else
            <button wire:click="setUserType('pravno lice')" class="pb-2 px-3 border-b-4 font-semibold text-md border-gray-400 text-gray-400 hover:text-dark-gray transition-all hover:border-dark-gray">Pravno lice</button>
        @endif
    </div>

    @if ($korisnik === 'fizicko lice')
        <form method="POST" action="{{ route('register') }}" class="flex flex-col lg:px-5 lgMin:px-36">
            @csrf

            <input type="hidden" name="userType" value="fizicko lice">


            <!-- Name -->
            <div>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Ime" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Lozinka"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                placeholder="Potvrdite lozinku"
                                name="password_confirmation" required />
            </div>

            <div class="text-right mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Već ste registrovani?
                </a>
            </div>

            <div class="mt-4">
                

                <div class="text-center  mt-16">
                    <button type="submit" class="py-2 px-4 bg-dark-gray text-whitee rounded-full hover:bg-black hover:text-white transition-all w-48">Registrujte se</button>
                </div>
            </div>
        </form>
    @endif

    @if($korisnik === 'pravno lice')
        <form method="POST" action="{{ route('register') }}" class="flex flex-col lg:px-5 lgMin:px-36">
            @csrf

            <input type="hidden" name="userType" value="pravno lice">

            <!-- Ime zastupnika -->
            <div>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Ime zastupnika" required autofocus />
            </div>

            <!-- Ime pravnog lica -->
            <div class="mt-4">
                <x-input id="ime_pravnog_lica" class="block mt-1 w-full" type="text" name="ime_pravnog_lica" :value="old('ime_pravnog_lica')" placeholder="Ime pravnog lica" required />
            </div>

            <!-- PIB -->
            <div class="mt-4">
                <x-input id="pib" class="block mt-1 w-full" type="number" name="pib" :value="old('pib')" placeholder="PIB" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Lozinka"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                placeholder="Potvrdite lozinku"
                                name="password_confirmation" required />
            </div>

            <div class="text-right mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Već ste registrovani?
                </a>
            </div>

            <div class="mt-4">
                

                <div class="text-center  mt-16">
                    <button type="submit" class="py-2 px-4 bg-dark-gray text-whitee rounded-full hover:bg-black hover:text-white transition-all w-48">Registrujte se</button>
                </div>
            </div>
        </form>
    @endif

</div>
