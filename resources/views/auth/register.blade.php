<x-guest-layout>
    <div class="max-w-main mx-auto min-h-screen flex flex-col gap-5 mt-20 lg:mt-10 mb-10">

        <x-auth-card>

            <div class="w-2/3 bg-white rounded-xl mdMin:rounded-r-none md:rounded-b-none px-5 pt-5 pb-24 md:pb-20 md:w-full">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <div class="flex justify-start items-center gap-2 mb-16 md:mb-12">
                    <img src="https://cdn.pixabay.com/photo/2014/04/02/11/16/cog-305746_1280.png" alt="" class="w-10 h-10">
                    <h2 class="text-lg font-semibold text-dark-gray">KUPI MAŠINU</h2>
                </div>

                <h1 class="text-4xl font-bold text-redd text-center mb-4 md:text-3xl">Napravite svoj nalog</h1>
                <p class="text-center text-dark-gray">Dobrodošli!</p>
                <p class="text-center mb-12 text-dark-gray">Unesite vaše podatke u poljima ispod.</p>


                <form method="POST" action="{{ route('register') }}" class="flex flex-col lg:px-5 lgMin:px-36">
                @csrf

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

            </div>

            <div class="w-1/3 md:w-full shrink-0 bg-dark-gray p-8 rounded-xl mdMin:rounded-l-none md:rounded-t-none px-5 pt-5 flex flex-col items-center justify-center md:py-12 md:px-8">
                <h1 class="text-3xl font-bold text-whitee text-center mb-">Već imate nalog?</h1>
                <p class="text-whitee text-center mt-3">Prijavite se na Vaš postojeći nalog unosom podataka!</p>

                <div class="mt-6">
                    <a href="{{ route('login') }}" class="py-2 px-8 bg-redd text-whitee rounded-full hover:bg-red-600 hover:text-white transition-all">Prijavite se</a>
                </div>
            </div>
            
        </x-auth-card>

    </div>
</x-guest-layout>
