<x-guest-layout>

    <div class="max-w-footer mx-auto min-h-screen flex flex-col gap-5 items-center justify-center -mt-12">

        <div class="flex justify-between items-center w-full">
            <!-- BACK BUTTON -->
            <form action="{{ route('homepage') }}" class="self-start">
                <button class="bg-white rounded-xl px-3 py-2 flex justify-center gap-2 items-center font-semibold shadow-card" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Povratak
                </button>
            </form>
            <!---->

            <a href="{{ route('register') }}" class="bg-white rounded-xl px-3 py-2 font-semibold shadow-card">Registracija</a>
        </div>
       

        <x-auth-card>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <h3 class="text-lg text-black font-semibold text-center mb-5">Prijavite se</h3>
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Lozinka')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>
    
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <x-button class="ml-3">
                        Prijava
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>

    

    


        
</x-guest-layout>
