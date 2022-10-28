<div>

    <!--Post for desktop -->
    <div class="border rounded-2xl p-5 bg-white shadow-card md:hidden post">

        <div class="flex gap-5 justify-start">
            <div class="w-64 shrink-0">


                <img src="{{ asset('images/'.$post->images()->first()->link) }}" alt="" class="rounded-xl">

                {{-- py-2 bg-black-700 text-white rounded-lg mt-3  --}}
                <div 
                x-data="{showKontakt:false}"
                class="kontakt-info relative">
                    <div 
                    @click="showKontakt = !showKontakt"
                    class="flex flex-col font-semibold">
                        <div class="flex items-center justify-center p-3 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                              
                            <p class="font-semibold ml-2">{{ $post->user->name }}</p>
                            <p class="ml-2">|</p>
                            <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
                        </div>
                        

                        <a 
                        x-cloak
                        x-show="showKontakt"
                        href="#" class="text-sm hover:bg-gray-200 py-1 text-center hover:text-black mb-3 font-semibold">Svi oglasi</a>

                    </div>


                    

                </div>
            </div>

            <div class="flex flex-col gap-2 w-full">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-2">{{ $post->naziv }}</a>
                <p class="font-bold text-blue-600 text-lg mb-5">{{ $post->cena }} &euro;</p>
    
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
                        <td class="py-1 w-1/2">Ispravnost: <span class="font-semibold">@if ($post->ispravnost == 1) Ispravno  @else Neispravno @endif</span></td>
                        <td class="py-1">Zamena: <span class="font-semibold">@if ($post->zamena == 1) Da  @else Ne @endif</span></td>
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
    <div class=" rounded-2xl p-5 bg-white flex flex-col justify-start shadow-card relative mdMin:hidden post">

        <div class="flex gap-3 mb-6">
            <div class="flex">
                <div class="w-36 shrink-0">
                    <img src="" alt="" class="rounded-lg">
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-bold line-clamp-3">{{ $post->naziv }}</a>
                <p class="font-bold text-blue-700 text-lg">{{ $post->cena }} &euro;</p>
            </div>
        </div>


        <div class="flex gap-3 mb-6">
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



        {{-- flex justify-center items-center gap-2 hover:cursor-pointer rounded-lg  bg-blue-700 py-2 text-white font-semibold --}}
        <div 
        x-data="{showKontakt:false}"
        class="flex flex-col kontakt-info">

            <div 
            @click="showKontakt = !showKontakt"
            class="flex justify-center items-center gap-2 p-3 hover:cursor-pointer font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                
                <p class="">{{ $post->user->name }}</p>
    
                <p class="ml-2">|</p>
                
                <p class="ml-2">{{ $post->kontakt }}</p>
    

            </div>
            

            <a 
                x-cloak
                x-show="showKontakt"
                href="#" class="text-sm hover:bg-gray-200 py-1 text-center hover:text-gray-800 mb-3 font-semibold">Svi oglasi
            </a>

        </div>

        {{-- <p class="text-xs text-center mt-4 text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p> --}}


    </div>


</div>
