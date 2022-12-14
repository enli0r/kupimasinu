<x-app-layout>
    <x-auth-card>
        <div class="sm:flex sm:items-center sm:justify-center" style="min-height: 60vh;">

            <div class="max-w-main mx-auto bg-white rounded-2xl flex shadow-card sm:flex-col">
                <div class="rounded-2xl bg-dark-gray flex justify-center smMin:basis-36 p-3 smMin:grow-0 smMin:shrink-0 items-center sm:bg-dark-gray border w-full">
                    <img src="{{ asset('images/Light.png') }}" class="w-full h-auto sm:w-36">
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
</x-app-layout>
