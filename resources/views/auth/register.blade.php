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

            <a href="{{ route('login') }}" class="bg-white rounded-xl px-4 py-2 font-semibold shadow-card">Prijava</a>
        </div>


        <x-auth-card>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h3 class="text-lg text-black font-semibold text-center mb-5">Registrujte se</h3>


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Ime')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Lozinka')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Potvrdite lozinku')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        Već ste registrovani?
                    </a>

                    <x-button class="ml-4">
                        Registrujte se
                    </x-button>
                </div>
            </form>
        </x-auth-card>

    </div>
</x-guest-layout>
