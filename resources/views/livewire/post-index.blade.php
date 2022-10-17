<div 
    x-data="{showKontaktDesktop:false}"
>

    <!--Post for desktop -->
    <div class="border rounded-2xl p-5 bg-white hover:shadow-card md:hidden">

        <div class="flex gap-5 justify-start">
            <div class="w-64 shrink-0">
                <img src="{{ $post->images()->first()->link }}" alt="" class="">

                <div class="border py-2 bg-blue-500 text-white rounded-t-none rounded-xl mt-2">
                    <div class="flex items-center justify-center">
                        <img src="../public/images/white.png" alt="" class="w-6 h-6 ">
                        <p class="font-semibold ml-1">{{ $post->user->name }}</p>
                        <p class="ml-2">|</p>
                        <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2 w-full">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-2">{{ $post->naziv }}</a>
                <p class="font-semibold text-blue-600 text-lg mb-5">{{ $post->cena }} &euro;</p>
                <hr class="mb-2">
                <div class="w-full flex gap-5 items-start">
    
                    <table class="w-full">
                        <tr class="bg-gray-200">
                            <td class="py-1 w-1/2">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                            <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                        </tr>
    
                        <tr class="">
                            <td class="py-1 w-1/2">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                            <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                        </tr>
    
                        <tr class="bg-gray-200">
                            <td class="py-1 w-1/2">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                            <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                        </tr>
    
                        <tr class="">
                            <td class="py-1 w-1/2">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                        </tr>
                    </table>
    
                    <div class="border px-3 py-3 bg-blue-500 text-white rounded-2xl h-auto w-28 shrink-0 hidden">
                        <div class="flex flex-col items-center gap-1">
                            <img src="../public/images/white.png" alt="" class="w-6 h-6 ">
                            <p class="font-semibold ">{{ $post->user->name }}</p>
                            <p class="font-semibold">{{ $post->kontakt }}</p>
                        </div>
                    </div>
    
                </div>
    
                
                
            </div>
        </div>
        

    </div>


    <!-- Post for mobile -->
    <div class="border rounded-2xl p-5 bg-white flex flex-col justify-start relative hover:shadow-card mdMin:hidden">

        <div class="flex gap-3 mb-5">
            <div class="flex">
                <div class="w-36 shrink-0">
                    <img src="{{ $post->images()->first()->link }}" alt="" class="">
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-3">{{ $post->naziv }}</a>
                <p class="font-semibold text-blue-600 text-lg">{{ $post->cena }} &euro;</p>
            </div>
        </div>

        <hr class="mb-5">

        <div class="flex gap-3 mb-5 ">
            <table class="w-full">
                <tr class="bg-gray-200">
                    <td class="py-1">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                    <td class="py-1">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
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


        <div class="flex justify-center items-center gap-2 hover:cursor-pointer rounded-t-none rounded-xl bg-blue-500 py-2 text-white font-semibold">

            <img src="../public/images/white.png" alt="" class="w-6 h-6">
            
            <p class="">{{ $post->user->name }}</p>

            <p class="ml-2">|</p>
            
            <p class="ml-2">{{ $post->kontakt }}</p>

                  
        </div>
    </div>


</div>
