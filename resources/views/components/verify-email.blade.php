<x-auth-card>

    <div x-data="{showVerify:true}" class="relative">
        <button
            @click="showVerify = false"
            x-show="showVerify"
            class="position absolute" style="top: -15px; right:-15px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-redd bg-body-bg rounded-full p-1">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
        </button>

        <div 
        x-show="showVerify"
        class="max-w-main mx-auto bg-white rounded-2xl flex shadow-card">
            <div class="rounded-2xl bg-dark-gray basis-36 p-3 grow-0 shrink-0 flex justify-center items-center lg:hidden">
                <img src="{{ asset('images/Light.png') }}" class="w-full h-auto">
            </div>


            <div class="flex flex-col gap-5 p-5">

                <div class="text-sm text-dark-gray">
                    Hvala vam što ste se registrovali. Da biste kreirali novi oglas, potrebno je da verifikujete vašu email adresu, tako što ćete kliknuti na link u emailu koji Vam je poslat. Ako niste dobili naš email, rado ćemo vam poslati ponovo.
                    {{-- {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }} --}}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="font-md text-sm text-green-600 font-semibold">
                        Novi verifikacioni link Vam je poslat na email koji ste uneli prilikom registrovanja.
                        {{-- {{ __('A new verification link has been sent to the email address you provided during registration.') }} --}}
                    </div>
                @endif

                <div class="flex justify-center gap-5 items-center">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="rounded-2xl p-3 text-whitee bg-dark-gray hover:bg-black hover:text-white transition-all font-semibold">
                                Pošaljite ponovo
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="nav-link font-semibold text-md">
                            Odjavite se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-auth-card>
