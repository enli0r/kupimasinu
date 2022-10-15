<div class="">

    <!--Post for desktop -->
    <div class="border rounded-2xl p-5 bg-white flex gap-5 justify-start relative hover:shadow-card md:hidden">
        <div class="w-64 shrink-0">
            <img src="{{ $post->images()->first()->link }}" alt="" class="rounded-xl">
        </div>
        
        <div class="flex flex-col gap-2 w-full">
            <h3 class="text-md font-semibold line-clamp-2">{{ $post->naziv }}</h3>
            <p class="font-semibold text-blue-600 text-lg mb-5">{{ $post->cena }} &euro;</p>
            <div class="flex gap-10 justify-start items-top">
                <div class="flex flex-col gap-1">
                    <p>Tip: @if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</p>
                    <p>Korišćenost: @if ($post->koriscenost == 1) Polovno  @else Novo @endif</p>
                    <p>Ispravnost: @if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</p>
                    <p>Proizvođač: @if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</p>
                </div>

                <div class="flex flex-col gap-1">
                    <p>{{ $post->mesto }}</p>
                    <p>Godište: @if ($post->godina != null) {{ $post->godina }}  @else / @endif</p>
                    <p>Zamena: @if ($post->koriscenost == 1) Da  @else Ne @endif</p>
                </div>
            </div>
            <div class="flex justify-end items-center gap-1 absolute bottom-5 right-5 hover:cursor-pointer">
                <p class="font-semibold">{{ $post->user->name }}</p>


                <img src="https://i.ibb.co/VNWThst/icons8-person-64.png" alt="" class="w-6 h-6 ">
                  
            </div>
        </div>

    </div>


    <!-- Post for mobile -->
    <div class="border rounded-2xl p-5 bg-white flex flex-col justify-start relative hover:shadow-card mdMin:hidden">

        <div class="flex gap-3 mb-5">
            <div class="flex">
                <div class="w-32 shrink-0">
                    <img src="{{ $post->images()->first()->link }}" alt="" class="rounded-lg">
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <h3 class="text-md font-semibold line-clamp-3">{{ $post->naziv }}</h3>
                <p class="font-semibold text-blue-600 text-lg">{{ $post->cena }} &euro;</p>
            </div>
        </div>


        <div class="flex gap-3 mb-5 ">
            <div class="flex flex-col gap-1 flex-1">
                <p>Tip: @if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</p>
                <p>Ispravnost: @if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</p>
                <p>Proizvođač: @if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</p>
                <p>Zamena: @if ($post->koriscenost == 1) Da  @else Ne @endif</p>
            </div>

            <div class="flex flex-col gap-1">
                <p>Korišćenost: @if ($post->koriscenost == 1) Polovno  @else Novo @endif</p>
                <p>Godište: @if ($post->godina != null) {{ $post->godina }}  @else / @endif</p>
                <p>{{ $post->mesto }}</p>
            </div>
        </div>


        <div class="flex justify-center items-center gap-1 bottom-5 right-5 hover:cursor-pointer">
            <p class="font-semibold">{{ $post->user->name }}</p>

            <img src="https://i.ibb.co/VNWThst/icons8-person-64.png" alt="" class="w-6 h-6 ">
                  
        </div>
    </div>


</div>
