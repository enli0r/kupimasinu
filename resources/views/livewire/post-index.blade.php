<div>

    <!--Post for desktop -->
    <div class="border rounded-2xl p-5 bg-white shadow-card md:hidden">

        <div class="flex gap-5 justify-start">
            <div class="w-64 shrink-0">
                <img src="{{ $post->images()->first()->link }}" alt="" class="">

                <div class="border py-2 bg-red-600 text-white rounded-lg mt-2">
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
    
                <table class="w-full ">
                    <tr class="bg-gray-100 text-gray-800">
                        <td class="py-1 w-1/2">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                        <td class="py-1 ">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                    </tr>

                    <tr class="text-gray-800">
                        <td class="py-1 w-1/2">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                        <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                    </tr>

                    <tr class="bg-gray-100 text-gray-800" >
                        <td class="py-1 w-1/2">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                        <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                    </tr>

                    <tr class="text-gray-800">
                        <td class="py-1 w-1/2">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                    </tr>
                </table>
                    
    
                <p class="mt-auto self-end text-sm text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>
                
                
            </div>
        </div>
        

    </div>


    <!-- Post for mobile -->
    <div class=" rounded-2xl p-5 bg-white flex flex-col justify-start relative shadow-card  mdMin:hidden">

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
            <table class="w-full ">
                <tr class="bg-gray-100 text-gray-800">
                    <td class="py-1">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @else Mašina za metal @endif</span></td>
                    <td class="py-1">Mesto: <span class="font-semibold">{{ $post->mesto }}</span></td>
                </tr>

                <tr class="text-gray-800">
                    <td class="py-1">Korišćenost: <span class="font-semibold">@if ($post->koriscenost == 1) Polovno  @else Novo @endif</span></td>
                    <td class="py-1">Godište: <span class="font-semibold">@if ($post->godina != null) {{ $post->godina }}  @else / @endif</span></td>
                </tr>

                <tr class="bg-gray-100 text-gray-800">
                    <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->koriscenost == 1) Ispravno  @else Neispravno @endif</span></td>
                    <td class="py-1">Zamena: <span class="font-semibold">@if ($post->koriscenost == 1) Da  @else Ne @endif</span></td>
                </tr>

                <tr class="text-gray-800">
                    <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                </tr>
            </table>
        </div>


        <div class="flex justify-center items-center gap-2 hover:cursor-pointer rounded-lg bg-red-600 py-2 text-white font-semibold">

            <img src="https://i.ibb.co/Kb1mp8Y/white.png" alt="" class="w-6 h-6">
            
            <p class="">{{ $post->user->name }}</p>

            <p class="ml-2">|</p>
            
            <p class="ml-2">{{ $post->kontakt }}</p>

                  
        </div>

        <p class="text-xs text-center mt-4 text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>


    </div>


</div>
