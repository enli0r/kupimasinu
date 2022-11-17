<div>

    <!--Post for desktop -->
    <div class="rounded-2xl p-5 bg-white shadow-card md:hidden post">
        <div class="flex gap-5 justify-start">
            <div class="w-60 shrink-0">

                <a href="{{ route('posts.show', $post) }}">
                    <div class="post-img-container w-full h-60 p-2 border rounded-xl flex items-center justify-center hover:bg-red">
                        <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" alt="" class="rounded-xl post-image">
                    </div>
                </a>

                <form class="mt-3" action="{{ route('user', $post->user) }}">
                    <button class="flex items-center justify-center hover:cursor-pointer bg-dark-gray text-whitee w-full rounded-xl p-3 hover:bg-black transition-all hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                            
                        <p class="font-semibold ml-1">{{ explode(' ', trim($post->user->name))[0] }} </p>
                    </button>
                        
                </form>
            </div>

            <div class="flex flex-col gap-2 w-full">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-semibold line-clamp-2 text-dark-gray hover:text-black">{{ $post->naziv }}</a>
                <p class="font-bold text-redd text-lg mb-3">{{ $post->cena }} &euro;</p>
    
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
                    <a href="{{ route('posts.show', $post) }}">
                        <div class="post-index-img-container h-36 flex justify-center items-center p-2 border rounded-lg">
                            <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" alt="" class="rounded-lg post-image">
                        </div>
                        
                    </a>
                </div>
            </div>
    
            <div class="flex flex-col gap-3">
                <a href="{{ route('posts.show', $post) }}" class="text-md font-bold line-clamp-3">{{ $post->naziv }}</a>
                <p class="font-bold text-lg text-redd" style="">{{ $post->cena }} &euro;</p>
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
                    <td class="py-1">Ispravnost: <span class="font-semibold">@if ($post->ispravnost == 1) Ispravno  @else Neispravno @endif</span></td>
                    <td class="py-1">Zamena: <span class="font-semibold">@if ($post->zamena == 1) Da  @else Ne @endif</span></td>
                </tr>

                <tr class="text-gray-800">
                    <td class="py-1">Proizvođač: <span class="font-semibold">@if ($post->proizvodjac != null) {{ $post->proizvodjac }}  @else / @endif</span></td>
                </tr>
            </table>
        </div>



        {{-- <p class="text-xs text-center mt-4 text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p> --}}


        <form action="{{ route('user', $post->user) }}">

            <button class="flex justify-center items-center gap-2 p-3 hover:cursor-pointer font-semibold bg-dark-gray text-whitee w-full rounded-2xl hover:bg-black hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                
                <p class="">{{explode(' ', trim($post->user->name))[0] }}</p>
            </button>
        
        </form>

    </div>


</div>
