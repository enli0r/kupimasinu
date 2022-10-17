<div class="mb-5" style="min-height: 70vh;">
    <!-- DESKTOP VERSION -->
    <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card md:hidden">
        <div class="flex gap-5">
            <div class="w-100 shrink-0">
                <img src="{{ $post->images()->first()->link }}" class="w-full" alt="">
                
                <div class="border py-2 bg-red-500 text-white rounded-t-none rounded-xl mt-2">
                    <div class="flex items-center justify-center">
                        <img src="../images/white.png" alt="" class="w-6 h-6 ">
                        <p class="font-semibold ml-1">{{ $post->user->name }}</p>
                        <p class="ml-2">|</p>
                        <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
                    </div>
                </div>
            </div>
    
            <div class="flex flex-col gap-2 w-full">
                <p class="text-lg font-semibold">{{ $post->naziv }}</p>
                <p class="text-lg text-blue-500 font-semibold mb-5">{{ $post->cena }} &euro;</p>
                <hr class="mb-2">
    
                <div class="flex gap-5 items-start">
                    <table class="w-full">
                        <tr class="bg-gray-200">
                            <td class="py-1 ">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                            <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                        </tr>
    
                        <tr class="">
                            <td class="py-1 ">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                            <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                        </tr>
    
                        <tr class="bg-gray-200">
                            <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                            <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                        </tr>
    
                        <tr class="">
                            <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
    
        <div class="space-y-2">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
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

        <div>
            <table class="w-full">
                <tr class="bg-gray-200">
                    <td class="py-1">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                    <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                </tr>

                <tr class="">
                    <td class="py-1">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                    <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                </tr>

                <tr class="bg-gray-200">
                    <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                    <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                </tr>

                <tr class="">
                    <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                </tr>
            </table>    
        </div>

        

        <div class="space-y-2">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
        </div>  

        <div class="border py-2 bg-red-500 text-white rounded-t-none rounded-2xl">
            <div class="flex items-center justify-center">
                <img src="../images/white.png" alt="" class="w-6 h-6 ">
                <p class="font-semibold ml-1">{{ $post->user->name }}</p>
                <p class="ml-2">|</p>
                <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
            </div>
        </div>

    </div>


</div>


