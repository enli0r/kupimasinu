<x-app-layout>
    <x-auth-card>
        <div class="flex justify-center items-center w-full" style="min-height: 60vh;">
            <div class="max-w-footer w-full shadow-dialog rounded-2xl bg-white" >
                <div class="rounded-2xl bg-dark-gray flex justify-center smMin:basis-36 p-3 smMin:grow-0 smMin:shrink-0 items-center sm:bg-dark-gray border w-full">
                    <img src="{{ asset('images/Light.png') }}" class="w-44 h-auto sm:w-36">
                </div>


                <div class="p-5">
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
            
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="text-md font-semibold text-dark-gray"><span class="text-redd">*</span>Email</label>
            
                            <x-input id="email" class="block mt-1 w-full bg-gray-100" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" class="text-md font-semibold text-dark-gray"><span class="text-redd">*</span>Nova lozinka</label>
            
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="text-md font-semibold text-dark-gray"><span class="text-redd">*</span>Ponovite lozinku</label>
            
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                        </div>
            
                        <div class="flex items-center justify-center mt-6">
                            <button type="submit" class="rounded-2xl p-3 bg-dark-gray text-whitee hover:bg-black hover:text-white transition-all">
                                Potvrdite novu lozinku
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        
    </x-auth-card>
</x-app-layout>
