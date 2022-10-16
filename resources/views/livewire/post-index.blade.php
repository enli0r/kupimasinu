<div 
    x-data="{showKontaktDesktop:false}"
>

    <!--Post for desktop -->
    <div class="border rounded-2xl p-5 bg-white flex gap-5 justify-start relative hover:shadow-card md:hidden">
        <div class="w-64 shrink-0">
            <img src="{{ $post->images()->first()->link }}" alt="" class="rounded-xl">
        </div>
        
        <div class="flex flex-col gap-2 w-full">
            <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-2">{{ $post->naziv }}</a>
            <p class="font-semibold text-blue-600 text-lg mb-5">{{ $post->cena }} &euro;</p>
            <hr class="mb-2">
            <div class="flex gap-10 justify-start items-top">
                <div class="flex flex-col gap-1">
                    <p>Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></p>
                    <p>Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></p>
                    <p>Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span> </p>
                    <p>Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span> </p>
                </div>

                <div class="flex flex-col gap-1">
                    <p>Mesto: <span class="font-semibold">{{ $post->mesto }}</span> </p>
                    <p>Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span> </p>
                    <p>Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span> </p>
                </div>
            </div>
            <div 
            x-on:click="showKontaktDesktop = !showKontaktDesktop"
            class="flex flex-col justify-end items-center gap-2 absolute bottom-5 right-5 hover:cursor-pointer rounded-xl bg-blue-500 text-white px-4 py-2 font-semibold">
                <div class="flex items-center gap-1">
                    <p class="font-semibold">{{ $post->user->name }}</p>
                    <img src="../public/images/white.png" alt="" class="w-6 h-6 ">  
                </div>
                
                <div
                    x-cloak
                    x-show="showKontaktDesktop"
                >
                    <p>{{ $post->kontakt }}</p>
                </div>

            </div>
        </div>

    </div>


    <!-- Post for mobile -->
    <div 
    x-data="{showKontaktMobile:false}"
    class="border rounded-2xl p-5 bg-white flex flex-col justify-start relative hover:shadow-card mdMin:hidden">

        <div class="flex gap-3 mb-5">
            <div class="flex">
                <div class="w-32 shrink-0">
                    <img src="{{ $post->images()->first()->link }}" alt="" class="rounded-lg">
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-3">{{ $post->naziv }}</a>
                <p class="font-semibold text-blue-600 text-lg">{{ $post->cena }} &euro;</p>
            </div>
        </div>

        <hr class="mb-5">

        <div class="flex gap-3 mb-5 ">
            <div class="flex flex-col gap-1 justify-start" style="width: 60%">
                <p>Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></p>
                <p>Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></p>
                <p>Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span> </p>
                <p>Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span> </p>
            </div>

            <div class="flex flex-col  gap-1 justify-start">
                <p>Mesto: <span class="font-semibold">{{ $post->mesto }}</span> </p>
                <p>Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span> </p>
                <p>Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span> </p>
            </div>
        </div>


        <div 
        x-cloak
        x-on:click="showKontaktMobile = !showKontaktMobile"
        class="flex flex-col justify-center items-center gap-2 hover:cursor-pointer rounded-xl bg-blue-500 px-4 py-2 text-white font-semibold">

            <div class="flex justify-center items-center gap-1">
                <p class="">{{ $post->user->name }}</p>

                <img src="../public/images/white.png" alt="" class="w-6 h-6">
            </div>

            <div
                x-show="showKontaktMobile"
                
            >
                <p class="">{{ $post->kontakt }}</p>
            </div>
                  
        </div>
    </div>


</div>
