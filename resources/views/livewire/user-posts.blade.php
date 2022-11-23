<div 
class="space-y-7"
x-data="{showFilters:false}"
x-init="window.livewire.on('gotoTop', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    })
})"
>



    <div class="lgMin:flex lgMin:gap-5" style="min-height: 75vh;">

        <!-- FILTERS -->
        <div class="lg:hidden filters-desktop shrink-0 sticky">
            <div class="w-full mb-7" style="height: 31px;"></div>

            <div class="w-full p-5 shadow-card rounded-2xl z-10 bg-white">
            
            <div>
                <div class="flex flex-col gap-7 z-100">
                    <h3 class="text-redd text-lg font-semibold lg:hidden">Filteri</h3>
            
                    <!-- TIP -->
                    <div class="flex flex-col gap-3 justify-center">
                        <h2 class="font-semibold text-left">
                            Tip mašine
                        </h2>
                        
                        <div class="flex flex-col justify-center gap-3">
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input type="checkbox"  wire:click="updateTip('masina za drvo')"  name="tip" id="masina_za_drvo" value="masina za drvo" @if ($tip == 'masina za drvo') checked @endif />

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>
                                </div>
            
                                <label for="masina_za_drvo">Mašina za drvo</label>
                            </div>
                            
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input type="checkbox" wire:click="updateTip('masina za metal')"  name="tip" id="masina_za_metal" value="masina za metal" @if ($tip == 'masina za metal') checked @endif />

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                                
                                <label for="masina_za_metal">Mašina za metal</label>
                            </div>
            
                            <div class="flex items-center gap-1">

                                <div class="checkbox bounce filterable">

                                    <input type="checkbox" wire:click="updateTip('masina za plastiku')" name="tip" id="masina_za_plastiku" value="masina za plastiku" @if ($tip == 'masina za plastiku') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                                <label for="masina_za_plastiku">Mašina za plastiku</label>
                            </div>

                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input type="checkbox"  wire:click="updateTip('radna masina')"  name="tip" id="radna_masina" value="radna masina" @if ($tip == 'radna masina') checked @endif />

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>
                                </div>
            
                                <label for="radna_masina">Radna mašina</label>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END OF TIP -->

                    <!-- MESTO -->
                    <div 
                    @click.away="showMesta=false"
                    x-data="{showMesta:false}"
                    class="flex flex-col gap-2 items-start lg:hidden relative">
                        <label class="font-semibold text-dark-gray" for="mesto">Mesto</label>
                        <x-input class="w-full border" wire:model="mesto" @click="showMesta = !showMesta" type="text" name="mesto" id="mesto" autocomplete="off"/>
                        
                        @error('mesto')
                                <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                        

                        <!-- POPUP -->
                        <div 
                        x-cloak
                        x-show="showMesta"
                        class=" bg-dark-gray py-2 text-whitee overflow-y-auto shadow-dialog flex flex-col text-center" style="position: absolute; top: -170px; right:0; height:190px; width:230px;">
                            @foreach ($naselja as $mesto)
                                <label @click="showMesta = false" wire:click="updateMesto('{{ $mesto->naziv }}')" class="w-full hover:bg-gray-100 hover:text-dark-gray py-1 hover:cursor-pointer">{{ $mesto->naziv }}</label>
                            @endforeach
                        </div>


                    </div>
                    <!-- END OF MESTO -->  


                    <!-- CENA -->
                    <div>            
                        <div class="range-slider flex flex-col gap-2">
                            <p class="font-semibold text-left">Cena</p>
                            
            
                            <div class="flex justify-between mdMin:flex-col mdMin:gap-2">
                                <div class="flex gap-1 items-center">
                                    <label for="cena_od">Od:</label>
                                    <input wire:model="cena_od" id="cena_od" type="number" class="border bg-gray-100 rounded-full p-1 px-2 w-24"> 
                                    <p>&euro;</p>
                                </div>
                                
                                <div class="flex gap-1 items-center">
                                    <label for="cena_do">Do:</label>
                                    <input id="cena_do" type="number" class="border rounded-full bg-gray-100 py-1 px-2 w-24">
                                    <p>&euro;</p>
                                </div>
                                
                            </div>
            
                        </div>
                
                    </div>
                    <!-- END OF CENA -->

                    
                
                    
                    <!-- KORISCENOST -->
                    <div class="flex flex-col gap-3 justify-center">
                        <h2 class="font-semibold text-left">
                            Korišćenost
                        </h2>
                
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-1">

                                <div class="checkbox bounce filterable">

                                    <input wire:click="updateKoriscenost('polovno')" type="checkbox" name="koriscenost" id="polovno" value="polovno" @if ($koriscenost == 'polovno') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                                <label for="polovno">Polovno</label>
                            </div>
                            
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input wire:click="updateKoriscenost('novo')" type="checkbox" name="koriscenost" id="novo" value="novo" @if ($koriscenost == 'novo') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                                <label for="novo">Novo</label>
                            </div>
                
                
                        </div>
                        
                    </div>
                    <!-- END OF KORISCENOST -->
                    
                
                    <!-- ISPRAVNOST -->
                    <div class="flex flex-col gap-3 justify-center">
                        <h2 class="font-semibold text-left">
                            Ispravnost
                        </h2>
                
                        <div class="flex flex-col gap-3">
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input wire:click="updateIspravnost('ispravno')" type="checkbox" name="ispravnost" id="ispravno" value="ispravno" @if ($ispravnost == 'ispravno') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>
                                </div>
                                <label for="ispravno">Ispravno</label>
                            </div>
                            
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input wire:click="updateIspravnost('neispravno')" type="checkbox" name="ispravnost" id="neispravno" value="neispravno" @if ($ispravnost == 'neispravno') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                                <label for="neispravno">Neispravno</label>
                            </div>
                
                        </div>
                        
                    </div>
                    <!-- END OF ISPRAVNOST -->
                    
                
                    <!-- ZAMENA -->
                    <div class="flex flex-col gap-3 justify-center">
                        <h2 class="font-semibold text-left">
                            Zamena
                        </h2>
                
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">
                                    <input wire:click="updateZamena('da')" type="checkbox" name="zamena" id="zamena_da" value="da" @if ($zamena == 'da') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>
                                </div>
                                <label for="zamena_da">Da</label>
                            </div>
                            
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">
                                <input type="checkbox" wire:click="updateZamena('ne')" name="zamena" id="zamena_ne" value="ne" @if ($zamena == 'ne') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>

                                <label for="zamena_ne">Ne</label>
                            </div>

                        </div>
                
                        
                    </div>
                    <!-- END OF ZAMENA -->

                
                </div>                
            </div>
                
                
                
        
            </div>
        </div>
        <!-- END OF FILTERS -->

        <!--POSTS -->
        <div class="w-full">
            <!-- Secondary Filters -->
            <div class="flex mb-5 flex-col gap-5">

                <div class="flex md:w-full grow mb-2">

                    @auth
                        @if ($oglasi === 'svi')
                            <button wire:click="setOglasi('svi')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">
                                Svi oglasi
                            </button>
                        @else
                            <button wire:click="setOglasi('svi')" class="pb-2 px-3 border-b-4 font-semibold text-md border-gray-400 text-gray-400 hover:text-dark-gray transition-all hover:border-dark-gray">
                                Svi oglasi
                            </button>
                        @endif

                    
                        @if (auth()->user()->id == $user->id)
                            @if ($oglasi === 'odobreni')
                                <button wire:click="setOglasi('odobreni')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">Odobreni oglasi</button>
                            @else
                                <button wire:click="setOglasi('odobreni')" class="pb-2 px-3 border-b-4 font-semibold text-md border-gray-400 text-gray-400 hover:text-dark-gray transition-all hover:border-dark-gray">Odobreni oglasi</button>
                            @endif

                            @if ($oglasi === 'na cekanju')
                                <button wire:click="setOglasi('na cekanju')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">Oglasi na čekanju</button>
                            @else
                                <button wire:click="setOglasi('na cekanju')" class="pb-2 px-3 border-b-4 font-semibold text-md border-gray-400 text-gray-400 hover:text-dark-gray transition-all hover:border-dark-gray">Oglasi na čekanju</button>
                            @endif                            
                        @endif

                    @endauth

                    @guest
                        <button wire:click="setOglasi('svi')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">
                            Svi oglasi ovog korisnika
                        </button>
                    @endguest

                    @auth
                        @if (auth()->user()->id != $user->id)
                            <button wire:click="setOglasi('svi')" class="pb-2 px-3 border-b-4 font-semibold text-md border-dark-gray text-dark-gray">
                                Svi oglasi ovog korisnika
                            </button>
                        @endif
                    @endauth

                    
                </div>

                <!-- Search and sort -->
                <div class="relative flex gap-5 lg:flex-col">

                    <div class="grow">
                        <x-search />
                    </div>

                    
                    <div class="flex gap-5">
                        <div 
                        @click.away="showFilters=false"
                        class="w-full lgMin:hidden"
                        >
                        
                        <button 
                        @click="showFilters = !showFilters"
                        class="bg-white rounded-2xl shadow-card px-4 py-3 flex-1 w-full text-dark-gray font-semibold">
                            <div class="flex gap-3 justify-between items-center">
                                <p class="">Filteri</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </button>
        
                            <div
                                x-cloak
                                x-show="showFilters"
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="origin-top scale-y-0"
                                x-transition:enter-end="origin-top scale-y-100"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="origin-top scale-y-100"
                                x-transition:leave-end="origin-top scale-y-0"
                                class="bg-white w-full p-5 rounded-xl absolute left-0 top-32 z-10 shadow-dialog"
                            >
                        
                                <div>   
                                    <div>
                                        <div class="flex flex-col gap-7 z-100">
                                            <h3 class="text-redd text-lg font-semibold lg:hidden">Filteri</h3>
                                    
                                            <!-- TIP -->
                                            <div class="flex flex-col gap-3 justify-center">
                                                <h2 class="font-semibold text-left">
                                                    Tip mašine
                                                </h2>
                                                
                                                <div class="flex flex-col justify-center gap-3">
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">

                                                            <input type="checkbox"  wire:click="updateTip('masina za drvo')"  name="tip" id="masina_za_drvo" value="masina za drvo" @if ($tip == 'masina za drvo') checked @endif />

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>
                                                        </div>
                                    
                                                        <label for="masina_za_drvo">Mašina za drvo</label>
                                                    </div>
                                                    
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">

                                                            <input type="checkbox" wire:click="updateTip('masina za metal')"  name="tip" id="masina_za_metal" value="masina za metal" @if ($tip == 'masina za metal') checked @endif />

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        
                                                        <label for="masina_za_metal">Mašina za metal</label>
                                                    </div>
                                    
                                                    <div class="flex items-center gap-1">

                                                        <div class="checkbox bounce filterable">

                                                            <input type="checkbox" wire:click="updateTip('masina za plastiku')" name="tip" id="masina_za_plastiku" value="masina za plastiku" @if ($tip == 'masina za plastiku') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        <label for="masina_za_plastiku">Mašina za plastiku</label>
                                                    </div>

                                                    <div class="flex items-center gap-1">

                                                        <div class="checkbox bounce filterable">

                                                            <input type="checkbox" wire:click="updateTip('radna masina')" name="tip" id="radna_masina" value="radna masina" @if ($tip == 'radna masina') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        <label for="radna_masina">Radna mašina</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- END OF TIP -->


                                            <!-- MESTO -->
                                            <div 
                                            @click.away="showMesta=false"
                                            x-data="{showMesta:false}"
                                            class="flex flex-col gap-2 items-start relative md:max-w-full" style="max-width: 300px;">
                                                <label class="font-semibold text-dark-gray" for="mesto_pc">Mesto</label>
                                                <x-input class="border w-full" wire:model="mesto" @click="showMesta = !showMesta" type="text" name="mesto" id="mesto_pc" autocomplete="off"/>
                                                
                                                @error('mesto')
                                                        <small class="text-red-500 font-semibold">*{{ $message }}</small>
                                                @enderror
                                                

                                                <!-- POPUP -->
                                                <div 
                                                x-cloak
                                                x-show="showMesta"
                                                class=" bg-dark-gray py-2 text-whitee overflow-y-auto shadow-dialog flex flex-col text-center" style="position: absolute; top: -130px; right:0; height:150px; width:100%; max-width:300px;">
                                                    @foreach ($naselja as $mesto)
                                                        <label @click="showMesta = false" wire:click="updateMesto('{{ $mesto->naziv }}')" class="w-full hover:bg-gray-100 hover:text-dark-gray py-1 hover:cursor-pointer">{{ $mesto->naziv }}</label>
                                                    @endforeach
                                                </div>


                                            </div>
                                            <!-- END OF MESTO -->  


                                            <!-- CENA -->
                                            <div>            
                                                <div class="range-slider flex flex-col">
                                                    <p class="font-semibold text-left mb-7">Cena</p>
                                                    
                                    
                                                    <div class="flex items-center sm:justify-between gap-3">
                                                        <div class="flex gap-1 items-center">
                                                            <label for="cena_od">Od:</label>
                                                            <input wire:model="cena_od" id="cena_od" type="number" class="border rounded-full p-1 px-2 w-24 bg-gray-100"> 
                                                            <p>&euro;</p>
                                                        </div>
                                                        
                                                        <div class="flex gap-1 items-center">
                                                            <label for="cena_do">Do:</label>
                                                            <input wire:model="cena_do" id="cena_do" type="number" class="border rounded-full bg-gray-100 py-1 px-2 w-24">
                                                            <p>&euro;</p>
                                                        </div>
                                                        
                                                    </div>
                                    
                                                </div>
                                        
                                            </div>
                                            <!-- END OF CENA -->
                                        
                                            
                                            <!-- KORISCENOST -->
                                            <div class="flex flex-col gap-3 justify-center">
                                                <h2 class="font-semibold text-left">
                                                    Korišćenost
                                                </h2>
                                        
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex items-center gap-1">

                                                        <div class="checkbox bounce filterable">

                                                            <input wire:click="updateKoriscenost('polovno')" type="checkbox" name="koriscenost" id="polovno" value="polovno" @if ($koriscenost == 'polovno') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        <label for="polovno">Polovno</label>
                                                    </div>
                                                    
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">

                                                            <input wire:click="updateKoriscenost('novo')" type="checkbox" name="koriscenost" id="novo" value="novo" @if ($koriscenost == 'novo') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        <label for="novo">Novo</label>
                                                    </div>
                                        
                                        
                                                </div>
                                                
                                            </div>
                                            <!-- END OF KORISCENOST -->
                                            
                                        
                                            <!-- ISPRAVNOST -->
                                            <div class="flex flex-col gap-3 justify-center">
                                                <h2 class="font-semibold text-left">
                                                    Ispravnost
                                                </h2>
                                        
                                                <div class="flex flex-col gap-3">
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">

                                                            <input wire:click="updateIspravnost('ispravno')" type="checkbox" name="ispravnost" id="ispravno" value="ispravno" @if ($ispravnost == 'ispravno') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>
                                                        </div>
                                                        <label for="ispravno">Ispravno</label>
                                                    </div>
                                                    
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">

                                                            <input wire:click="updateIspravnost('neispravno')" type="checkbox" name="ispravnost" id="neispravno" value="neispravno" @if ($ispravnost == 'neispravno') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>
                                                        <label for="neispravno">Neispravno</label>
                                                    </div>
                                        
                                                </div>
                                                
                                            </div>
                                            <!-- END OF ISPRAVNOST -->
                                            
                                        
                                            <!-- ZAMENA -->
                                            <div class="flex flex-col gap-3 justify-center">
                                                <h2 class="font-semibold text-left">
                                                    Zamena
                                                </h2>
                                        
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">
                                                            <input wire:click="updateZamena('da')" type="checkbox" name="zamena" id="zamena_da" value="da" @if ($zamena == 'da') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>
                                                        </div>
                                                        <label for="zamena_da">Da</label>
                                                    </div>
                                                    
                                        
                                                    <div class="flex items-center gap-1">
                                                        <div class="checkbox bounce filterable">
                                                        <input type="checkbox" wire:click="updateZamena('ne')" name="zamena" id="zamena_ne" value="ne" @if ($zamena == 'ne') checked @endif/>

                                                            <svg viewBox="0 0 21 21">
                                                                <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                            </svg>

                                                        </div>

                                                        <label for="zamena_ne">Ne</label>
                                                    </div>

                                                </div>
                                        
                                                
                                            </div>
                                            <!-- END OF ZAMENA -->
                                        </div>                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative shrink-0">
                            <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
                        </div>
                    </div>
                </div>
                <!-- End of search and sort -->
            </div>
            <!-- End of secondary filters -->

            

            <div class="space-y-7">

                @if (count($posts))
                    @foreach ($posts as $post)
                        <livewire:post-index :wire:key="$post->id" :post='$post' />
                    @endforeach
                @else
                    <p class="w-full flex rounded-xl py-3 bg-white justify-center items-center text-red-500">Trenutno nema aktivnih oglasa!</p>
                @endif
                

                {{ $posts->links('pagination.livewire-pagination-links') }}

            </div>
        </div>
        <!-- End of posts-->

    </div>


    
</div>
