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

        <div class="flex justify-between items-center gap-5 mb-5">

            <!-- BACK BUTTON -->
            <form action="{{ URL::previous() }}">
                <button class="bg-white rounded-2xl p-3 flex justify-center gap-1 items-center shadow-card w-32" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                      
                    Povratak
                </button>
            </form>
            <!---->

            <!-- Edit & delete -->
            <div x-data="{showDetails:false}" class="relative">

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
        
                            <form action="{{ route('posts.delete', $post->slug) }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">Uklonite oglas</button>
                            </form>
                        @endif
                    </div>

                    
                @endauth
            </div>
            <!---->

        </div>
        
        
        <!-- DESKTOP VERSION -->
        <div class="md:hidden">
            

            <div class="space-y-8 bg-white p-5 rounded-2xl border shadow-card">         
                <div class="flex gap-5">
                    <div class="w-100 shrink-0">

                        <div class="post-img-container h-100 border rounded-2xl p-2 flex justify-center items-center hover:cursor-pointer">
                            <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="w-full rounded-2xl post-image hover:cursor-pointer" alt="">
                        </div>
                        
                        <div class="border p-3 bg-black text-gray-200 rounded-lg mt-3 kontakt-info">
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
                <div class="w-full border rounded-xl post-index-img-container p-2 relative hover:cursor-pointer" style="padding-top: 100%;">

                    <div class="rounded-xl hover:cursor-pointer absolute top-0 right-0 bottom-0 left-0 p-2 flex items-center justify-center post-image">

                        <img src="{{ asset('post-images/'.$post->images()->first()->link) }}" class="rounded-xl" style="" alt="">

                    </div>

                </div>
        
                <div class="flex flex-col font-semibold text-lg mt-5">
                    <p class="font-bold">{{ $post->naziv }}</p>
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
        
        

                <p class="text-xs text-center mt-10" style="color: #161A1D;">Postavljen: <span class="font-semibold">{{ date('d.m.Y', strtotime($post->created_at)) }}</span></p>

        
                <div class="kontakt-info p-3">
                    <div class="flex gap-2 items-center justify-center">
                        <div class="flex items-center justify-center">
                            <img src="../images/white.png" alt="" class="w-6 h-6 ">
                            <p class="font-semibold ml-1">{{explode(' ', trim($post->user->name))[0] }}</p>
                        </div>       

                       
                        <p>|</p>

                        <p class="font-semibold">{{ $post->kontakt }}</p>

                    </div>

                </div>
        
        
        
            </div>
        </div>

        


    </div>


</div>
