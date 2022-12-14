<x-app-layout>
    <x-back-button />


    <div class="max-w-main mx-auto min-h-screen flex flex-col gap-5 mt-20 lg:mt-0 mb-10">


        <x-auth-card>

            <div class="w-2/3 bg-white rounded-xl mdMin:rounded-r-none md:rounded-b-none px-5 py-24 md:pb-20 md:w-full">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                    
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                {{-- <div class="flex justify-start items-center gap-2 mb-16 md:mb-12">
                    <img src="{{ asset('images/sivo.png') }}" alt="" style="width: 120px;">
                </div> --}}

                <h1 class="text-4xl font-bold text-redd text-center mb-4 md:text-3xl">Prijavite se na Vaš nalog</h1>
                <p class="text-center text-dark-gray">Dobrodošli!</p>
                <p class="text-center mb-12 text-dark-gray">Unesite vaše podatke u poljima ispod.</p>

                <form method="POST" action="{{ route('login') }}" class="flex flex-col lg:px-5 lgMin:px-36">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        {{-- <x-label for="email" :value="__('Email')" /> --}}

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        {{-- <x-label for="password" :value="__('Lozinka')" /> --}}

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        placeholder="Lozinka"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex gap-2 items-center">
                            <div class="checkbox bounce filterable">
            
                                <input type="checkbox" name="remember" id="remember_me" value="1"/>
            
                                <svg viewBox="0 0 21 21">
                                    <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                </svg>
                            </div>

                            <label for="remember_me" class="text-sm text-dark-gray hover:cursor-pointer">Zapamti me</label>
                        </div>



                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-dark-gray hover:text-black" href="{{ route('password.request') }}">
                                Zaboravili ste šifru?
                            </a>
                        @endif
                    </div>

                    <div class="text-center  mt-16">
                        <button type="submit" class="py-2 px-4 bg-dark-gray text-whitee rounded-full hover:bg-black hover:text-white transition-all w-48">Prijavite se</button>
                    </div>
                </form>
            </div>

            <div class="w-1/3 md:w-full shrink-0 bg-dark-gray p-8 rounded-xl mdMin:rounded-l-none md:rounded-t-none px-5 pt-5 flex flex-col items-center justify-center md:py-12 md:px-8">
                <h1 class="text-3xl font-bold text-whitee text-center mb-">Novi ste ovde?</h1>
                <p class="text-whitee text-center mt-3">Registrujte se kako biste bili u mogućnosti da postavljate oglase.</p>

                <div class="mt-6">
                    <a href="{{ route('register') }}" class="py-2 px-8 bg-redd text-whitee rounded-full hover:bg-red-600 hover:text-white transition-all">Registrujte se</a>
                </div>

            </div>
        </x-auth-card>

           
    </div>

    

    


        
</x-app-layout>
