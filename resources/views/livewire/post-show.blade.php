<div class="mb-5" style="min-height: 70vh;">
    <!-- DESKTOP VERSION -->
    <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card md:hidden">
        <div class="flex gap-5">
            <div class="w-100 shrink-0">
                <img src="{{ $post->images()->first()->link }}" class="w-full rounded-2xl" alt="">
                
                <div class="border py-2 bg-blue-700 text-white rounded-lg mt-3">
                    <div class="flex items-center justify-center">
                        <img src="../images/white.png" alt="" class="w-6 h-6">
                        <p class="font-semibold ml-1 ">{{ $post->user->name }}</p>
                        <p class="ml-2">|</p>
                        <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
                    </div>
                </div>
            </div>
    
            <div class="flex flex-col gap-2 w-full">
                <p class="text-lg font-bold  ">{{ $post->naziv }}</p>
                <p class="text-lg text-blue-500 font-bold mb-5">{{ $post->cena }} &euro;</p>
    
                <table class="w-full mt-5">
                    <tr class="bg-gray-100 text-gray-800">
                        <td class="py-1 ">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                        <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                    </tr>

                    <tr class=" text-gray-800">
                        <td class="py-1 ">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                        <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                    </tr>

                    <tr class="bg-gray-100  text-gray-800">
                        <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                        <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                    </tr>

                    <tr class=" text-gray-800">
                        <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                    </tr>
                </table>    

                <p class="mt-auto self-end text-sm text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>

            </div>
        </div>
    
        <div class="space-y-2">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
        </div>   

    </div>


    <!-- Mobile version -->
    <div class="bg-white p-5 rounded-2xl border shadow-card mdMin:hidden">
        <div class="w-full">
            <img src="{{ $post->images()->first()->link }}" class="w-full rounded-xl" alt="">
        </div>

        <div class="flex flex-col gap-2 font-semibold text-lg mt-5">
            <p>{{ $post->naziv }}</p>
            <p class="text-blue-500 font-bold mt-2">{{ $post->cena }} &euro;</p>
        </div>


        <div class="mt-8">
            <table class="w-full">
                <tr class="bg-gray-100  text-gray-800">
                    <td class="py-1">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                    <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                </tr>

                <tr class=" text-gray-800">
                    <td class="py-1">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                    <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                </tr>

                <tr class="bg-gray-100  text-gray-800">
                    <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                    <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                </tr>

                <tr class=" text-gray-800">
                    <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                </tr>
            </table>    
        </div>



        <div class="space-y-3 mt-8">
            <p class="font-semibold block">Opis:</p>
            <hr>
            <p>{{ $post->opis }}</p>
        </div>  



        <div class="border py-2 bg-blue-700 text-white rounded-lg mt-8">
            <div class="flex items-center justify-center">
                <img src="../images/white.png" alt="" class="w-6 h-6 ">
                <p class="font-semibold ml-1">{{ $post->user->name }}</p>
                <p class="ml-2">|</p>
                <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
            </div>
        </div>

        <p class="text-xs text-center mt-4 text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>


    </div>


</div>


