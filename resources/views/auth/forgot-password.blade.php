<x-app-layout>
    <x-auth-card>

        <div class="flex justify-center items-center w-full" style="min-height: 60vh;">
            <div class="max-w-footer shadow-dialog rounded-2xl bg-white" >
                <div class="rounded-2xl bg-dark-gray flex justify-center smMin:basis-36 p-3 smMin:grow-0 smMin:shrink-0 items-center sm:bg-dark-gray border w-full">
                    <img src="{{ asset('images/Light.png') }}" class="w-44 h-auto sm:w-36">
                </div>


                <div class="p-5">
                    <div class="mb-4 text-sm text-gray-600">
                        <p>Zaboravili ste lozinku? Nema problema. Upišite vašu email adresu kako bismo Vam poslali link za restratovanje lozinke.</p>
                    </div>
            
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div class="flex flex-col gap-1">
                            <label for="email" class="text-md font-semibold text-dark-gray">Email</label>
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="flex items-center justify-center mt-4">
                            <button type="submit" class="rounded-2xl p-3 bg-dark-gray text-whitee hover:bg-black hover:text-white transition-all">
                                Pošalji mail
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        
        
    </x-auth-card>
</x-app-layout>
