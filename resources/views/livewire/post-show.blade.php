<div style="">

    <div class="showImages z-10">
        <!-- X -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 images-exit">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <!---->

        <livewire:show-images :post="$post" />
    </div>

    <div class="mb-5" style="min-height: 70vh;">

        <div class="flex justify-between items-center gap-5">

            <x-back-button />

            @auth
                @if(auth()->user()->id === $post->korisnik_id)
                    <!-- Edit & delete -->
                    <div x-data="{showDetails:false}" class="relative mb-5">

                        @auth

                            <div
                            @click="showDetails = !showDetails"
                            class="bg-white shadow-card rounded-2xl z-0 hover:cursor-pointer" style="padding: 5px 5px;"
                            >
                                <svg 
                                
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </div>
                            
                        
                            <div 
                            @click.away="showDetails=false"
                            x-cloak
                            x-show="showDetails"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="showDetails shadow-dialog">
                                @if ($post->korisnik_id == auth()->user()->id)
                                    <div class="text-center">
                                        <a href="{{ route('posts.edit', $post->slug) }}" class="nav-link">Izmenite oglas</a>
                                    </div>

                                    
                                    <button wire:click='deletePost()' type="submit" class="nav-link">Uklonite oglas</button>
                                @endif
                            </div>

                            
                        @endauth
                    </div>
                    <!---->
                @endif

                @if ($post->odobren === 0)
                    @if (auth()->user()->is_admin === 1)
                        <div class="flex gap-5">
                            <button 
                            wire:click="approvePost"
                            class="bg-white shadow-card p-3 rounded-2xl flex gap-2 items-center transition-all odobrite">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                
                                
                                Odobrite oglas
                            </button>


                            <button 
                            wire:click="deletePost"
                            class="bg-white shadow-card p-3 rounded-2xl flex gap-2 items-center uklonite">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                
                                
                                Uklonite oglas
                            </button>
                        </div>
                    @endif
                @endif

            @endauth               
        </div>
        
        
        <!-- DESKTOP VERSION -->
        <div class="md:hidden">
            

            <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card">         
                <div class="flex gap-5">
                    <div class="w-100 shrink-0">

                        <div class="post-img-container h-100 border rounded-2xl p-2 flex justify-center items-center hover:cursor-pointer">
                            <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="w-full rounded-2xl post-image hover:cursor-pointer" alt="">
                        </div>

                        

                    </div>

                    <div class="flex flex-col gap-2 w-full">
                        <p class="text-lg font-bold  ">{{ $post->naziv }}</p>
                        <p class="text-lg text-redd font-bold mb-5">{{ $post->cena }} &euro;</p>

                        <table class="w-full mt-5">
                            <tr class="bg-gray-100 text-gray-800">
                                <td class="py-1 ">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @elseif ($post->kategorija_id == 2) Mašina za metal  @elseif($post->kategorija_id == 3) Mašina za plastiku  @elseif($post->kategorija_id == 4) Radna mašina @endif</span></td>
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

                        {{-- User & Kontakt --}}
                        <div class="flex gap-3 items-center mt-20">

                            <form action="{{ route('user', $post->user) }}" class="w-1/2">
                                <button class="p-3 bg-dark-gray w-full text-gray-200 rounded-xl hover:bg-black transition-all">
                                    <div class="flex items-center justify-center">
                                        <img src="../images/white.png" alt="" class="w-6 h-6">
                                        <p class="font-semibold ml-1 ">{{ $post->user->name }}</p>
                                    </div>
                                </button>
                            </form>
                                
                            

                            <div class="text-center bg-redd text-whitee rounded-xl w-1/2 hover:bg-red-800 transition-all" style="padding: 0.85rem">
                                <p class="font-semibold">Telefon: {{ $post->kontakt }}</p>                                    
                            </div>
                        </div>
                        {{-- End of user & kontakt --}}

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
                <div class="w-full border rounded-xl post-index-img-container p-2 relative hover:cursor-pointer" style="padding-top: 100%;">

                    <div class="rounded-xl hover:cursor-pointer absolute top-0 right-0 bottom-0 left-0 p-2 flex items-center justify-center">

                        <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="rounded-xl post-image" style="" alt="">

                    </div>

                </div>
        
                <div class="flex flex-col font-semibold text-lg mt-5">
                    <p class="font-bold">{{ $post->naziv }}</p>
                    <p class="text-redd font-bold mt-2">{{ $post->cena }} &euro;</p>
                </div>
        
        
                <div class="mt-8">
                    <table class="w-full">
                        <tr class="bg-gray-100  text-gray-800">
                            <td class="py-1">Tip: <span class="font-semibold">@if ($post->kategorija_id == 1) Mašina za drvo @elseif ($post->kategorija_id == 2) Mašina za metal  @elseif($post->kategorija_id == 3) Mašina za plastiku  @elseif($post->kategorija_id == 4) Radna mašina @endif</span></td>
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
        
        

                

        
                <div class="mt-10 mb-5">
                    <div class="flex gap-2 items-center justify-center">
                        <form action="{{ route('user', $post->user) }}" class="flex-1 shrink-0">
                            <button class="flex items-center justify-center rounded-xl p-3 bg-dark-gray text-whitee w-full">
                                <img src="../images/white.png" alt="" class="w-6 h-6">
                                <p class="font-semibold ml-1">{{explode(' ', trim($post->user->name))[0] }}</p>
                            </button>   
                        </form>
                        
                        
                        <a href="tel:{{$post->kontakt}}" class="flex items-center font-semibold gap-1 justify-center bg-redd text-whitee rounded-xl p-3 w-20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>                                
                        </a>
                        

                    </div>

                </div>
        
                <p class="text-xs text-center" style="color: #161A1D;">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>
        
            </div>
        </div>

        


    </div>


</div>
