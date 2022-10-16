<div class="mb-5" style="min-height: 70vh;">
    <!-- DESKTOP VERSION -->
    <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card md:hidden">
        <div class="flex gap-5">
            <div class="w-100 shrink-0">
                <img src="{{ $post->images()->first()->link }}" class="w-full" alt="">
            </div>
    
            <div class="flex flex-col gap-2 w-full">
                <p class="text-lg font-semibold">{{ $post->naziv }}</p>
                <p class="text-lg text-blue-500 font-semibold mb-5">{{ $post->cena }} &euro;</p>
                <hr class="mb-2">
    
                <div class="flex gap-2 items-start">
                    <div class="flex flex-col gap-2 flex-1">
                        <p>Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></p>
                        <p>Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></p>
                        <p>Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span> </p>
                        <p>Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span> </p>
                        <p>Mesto: <span class="font-semibold">{{ $post->mesto }}</span> </p>
                        <p>Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span> </p>
                        <p>Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span> </p>
                    </div>
    
                    <div class="border px-4 py-4 bg-blue-500 text-white rounded-2xl h-auto custom:hidden">
                        <div class="flex flex-col items-center gap-1">
                            <img src="../images/white.png" alt="" class="w-6 h-6 ">
                            <p class="font-semibold ">{{ $post->user->name }}</p>
                            <p class="font-semibold">{{ $post->kontakt }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="space-y-2">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
        </div>   

        <div class="border px-4 py-2 bg-blue-500 text-white rounded-2xl customMin:hidden">
            <div class="flex flex-col items-center gap-2 justify-center">
                <div class="flex gap-1 items-center">
                    <img src="../images/white.png" alt="" class="w-6 h-6 ">
                    <p class="font-semibold ">{{ $post->user->name }}</p>
                </div>
    
                <p class="font-semibold">{{ $post->kontakt }}</p>
            </div>
        </div>
    </div>


    <!-- Mobile version -->
    <div class="space-y-5 bg-white p-5 rounded-2xl border shadow-card mdMin:hidden">
        <div class="w-full">
            <img src="{{ $post->images()->first()->link }}" class="w-full" alt="">
        </div>

        <div class="flex flex-col gap-2 font-semibold text-lg">
            <p>{{ $post->naziv }}</p>
            <p class="text-blue-500">{{ $post->cena }} &euro;</p>
        </div>

        <hr>

        <div class="flex flex-col gap-2 flex-1">
            <p>Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></p>
            <p>Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></p>
            <p>Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span> </p>
            <p>Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span> </p>
            <p>Mesto: <span class="font-semibold">{{ $post->mesto }}</span> </p>
            <p>Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span> </p>
            <p>Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span> </p>
        </div>

        

        <div class="space-y-2">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
        </div>  

        <div class="border px-4 py-2 bg-blue-500 text-white rounded-2xl">
            <div class="flex flex-col items-center gap-2 justify-center">
                <div class="flex gap-1 items-center">
                    <img src="../images/white.png" alt="" class="w-6 h-6 ">
                    <p class="font-semibold ">{{ $post->user->name }}</p>
                </div>
    
                <p class="font-semibold">{{ $post->kontakt }}</p>
            </div>
        </div>

    </div>


</div>


