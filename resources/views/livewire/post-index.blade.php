<div class="">
    <div class="border rounded-2xl p-5 bg-white flex gap-5 justify-start relative">
        <div class="w-64 shrink-0">
            <img src="{{ $post->images()->first()->link }}" alt="" class="rounded-xl">
        </div>
        
        <div class="flex flex-col gap-2 w-full">
            <h3 class="text-md font-semibold line-clamp-2">{{ $post->naziv }}</h3>
            <p class="font-semibold text-blue-600 text-lg">{{ $post->cena }} &euro;</p>
            <div class="flex gap-10 justify-start items-top">
                <div class="flex flex-col gap-1">
                    <p>Tip: @if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</p>
                    <p>Korišćenost: @if ($post->koriscenost == 1) Polovno  @else Novo @endif</p>
                    <p>Ispravnost: @if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</p>
                    <p>Proizvođač: @if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</p>
                    <p>Godište: @if ($post->godina != null) {{ $post->godina }}  @else / @endif</p>
                </div>

                <div class="flex flex-col gap-1">
                    <p>Grad: {{ $post->mesto }}</p>
                    <p>Zamena: @if ($post->koriscenost == 1) Da  @else Ne @endif</p>
                </div>
            </div>
            <div class="flex justify-end items-center gap-1 absolute bottom-5 right-5">
                <p class="font-semibold">{{ $post->user->name }}</p>


                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                  
            </div>
        </div>

    </div>
</div>
