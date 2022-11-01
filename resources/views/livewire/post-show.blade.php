<div style="">

    <div class="showImages">
        <!-- X -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 images-exit">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <!---->

        <livewire:show-images :post="$post" />
    </div>

    <div class="mb-5" style="min-height: 70vh;">

        <div class="flex justify-between items-center gap-5 mb-5">

            <!-- BACK BUTTON -->
            <form action="{{ URL::previous() }}">
                <button class="bg-white rounded-2xl p-3 flex justify-center gap-2 items-center shadow-card" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                      
                    Povratak
                </button>
            </form>
            <!---->

            <!-- Edit & delete -->
            <div class="flex bg-white rounded-lg shadow-card">
                @auth
                    @if ($post->korisnik_id == auth()->user()->id)
                        <a href="{{ route('posts.edit', $post->slug) }}" class="p-2 border-r border-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>                              
                        </a>
        
                        <form action="{{ route('posts.delete', $post->slug) }}" method="post">
                            @csrf
                            <button type="submit" class="p-2 border-l border-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                  
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            <!---->

        </div>
        
        
        <!-- DESKTOP VERSION -->
        <div class="md:hidden">
            

            <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card">         
                <div class="flex gap-5">
                    <div class="w-100 shrink-0">
                        <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="w-full rounded-2xl post-image hover:cursor-pointer" alt="">
                        
                        <div class="border p-3 bg-black text-gray-200 rounded-lg mt-3">
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
                        <p class="text-lg text-redd font-bold mb-5">{{ $post->cena }} &euro;</p>

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
        </div>
        


        <!-- Mobile version -->
        <div class="mdMin:hidden">

            <div class="bg-white p-5 rounded-2xl shadow-card ">
                <div class="w-full">
                    <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="w-full rounded-xl post-image hover:cursor-pointer" alt="">
                </div>
        
                <div class="flex flex-col gap-2 font-semibold text-lg mt-5">
                    <p>{{ $post->naziv }}</p>
                    <p class="text-redd font-bold mt-2">{{ $post->cena }} &euro;</p>
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
        
        
        
                <div class="mt-8">
                    <p class="font-semibold block" style="margin-bottom: 0.5rem">Opis:</p>
                    <hr class="" style="margin-bottom: 0.25rem">
                    <p>{{ $post->opis }}</p>
                </div>  
        
        

        
                <div class="border p-3 bg-gray-900 text-gray-200 rounded-xl mt-8">
                    <div class="flex items-center justify-center">
                        <img src="../images/white.png" alt="" class="w-6 h-6 ">
                        <p class="font-semibold ml-1">{{ $post->user->name }}</p>
                        <p class="ml-2">|</p>
                        <p class="font-semibold ml-2">{{ $post->kontakt }}</p>
                    </div>
                </div>
        
                {{-- <p class="text-xs text-center text-gray-600">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p> --}}

        
        
            </div>
        </div>

        


    </div>


</div>
