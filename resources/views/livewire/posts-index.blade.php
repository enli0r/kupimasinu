<div class="lgMin:flex lgMin:gap-5" style="min-height: 75vh;"
    x-data="{showFilters:false}"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>



    <!-- Return to TOP -->
    <button class="return-to-top  shadow-card">
        <svg wire:click="$emit('gotoTop')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
        </svg>
    </button>
    <!-- -->

    <!-- FILTERS -->
    <div class="lg:hidden filters-desktop shrink-0 sticky">

        <x-back-button class="mb-7" style="width: 270px;"/>
        

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
            
                                <div 
                                x-data="{showMarkText:false, showUnmarkText:false}"
                                class="flex items-center w-full oznaci-kategoriju relative">
                                    <label for="masina_za_drvo" class="hover:cursor-pointer">Mašina za drvo</label>

                                    @auth
                                        @if (in_array(1, $markedCategories))
                                            <button 
                                            @mouseover="showUnmarkText = true"
                                            @mouseover.away="showUnmarkText = false"
                                            @click="showUnmarkText = false"

                                            wire:click="updateMarkedCategory(1, {{ auth()->user()->id }})" class="ml-auto">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @else
                                        
                                            <button 
                                            @mouseover="showMarkText = true"
                                            @mouseover.away="showMarkText = false"
                                            @click="showMarkText = false"

                                            wire:click="updateMarkedCategory(1, {{ auth()->user()->id }})" class="ml-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </button>
                                
                                        @endif
                                    @endauth

                                    <div
                                    x-cloak
                                    x-show="showMarkText"
                                    class="showText"
                                    >
                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                    </div>

                                    <div
                                    x-cloak
                                    x-show="showUnmarkText"
                                    class="showText"
                                    >
                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                    </div>
                                </div>
                            </div>
                            
                
                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input type="checkbox" wire:click="updateTip('masina za metal')"  name="tip" id="masina_za_metal" value="masina za metal" @if ($tip == 'masina za metal') checked @endif />

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>
                    
                                <div 
                                x-data="{showMarkText:false, showUnmarkText:false}"
                                class="flex items-center w-full oznaci-kategoriju relative">
                                    <label for="masina_za_metal" class="hover:cursor-pointer">Mašina za metal</label>


                                    @auth
                                        @if (in_array(2, $markedCategories))
                                            <button 
                                            @mouseover="showUnmarkText = true"
                                            @mouseover.away="showUnmarkText = false"
                                            @click="showUnmarkText = false"
                                            wire:click="updateMarkedCategory(2, {{ auth()->user()->id }})" class="ml-auto">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @else
                                        
                                            <button 
                                            @mouseover="showMarkText = true"
                                            @mouseover.away="showMarkText = false"
                                            @click="showMarkText = false"

                                            wire:click="updateMarkedCategory(2, {{ auth()->user()->id }})" class="ml-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </button>
                                
                                        @endif
                                    @endauth

                                    <div
                                    x-cloak
                                    x-show="showMarkText"
                                    class="showText"
                                    >
                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                    </div>

                                    <div
                                    x-cloak
                                    x-show="showUnmarkText"
                                    class="showText"
                                    >
                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                    </div>
                                </div>
                            </div>
            
                            <div class="flex items-center gap-1">

                                <div class="checkbox bounce filterable">

                                    <input type="checkbox" wire:click="updateTip('masina za plastiku')" name="tip" id="masina_za_plastiku" value="masina za plastiku" @if ($tip == 'masina za plastiku') checked @endif/>

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>

                                </div>

                                <div 
                                x-data="{showMarkText:false, showUnmarkText:false}"
                                class="flex items-center w-full oznaci-kategoriju relative">
                                    <label for="masina_za_plastiku" class="hover:cursor-pointer">Mašina za plastiku</label>


                                    @auth
                                        @if (in_array(3, $markedCategories))
                                            <button 
                                            @mouseover="showUnmarkText = true"
                                            @mouseover.away="showUnmarkText = false"
                                            @click="showUnmarkText = false"
                                            wire:click="updateMarkedCategory(3, {{ auth()->user()->id }})" class="ml-auto">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @else
                                        
                                            <button 
                                            @mouseover="showMarkText = true"
                                            @mouseover.away="showMarkText = false"
                                            @click="showMarkText = false"

                                            wire:click="updateMarkedCategory(3, {{ auth()->user()->id }})" class="ml-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </button>
                                
                                        @endif
                                    @endauth

                                    <div
                                    x-cloak
                                    x-show="showMarkText"
                                    class="showText"
                                    >
                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                    </div>

                                    <div
                                    x-cloak
                                    x-show="showUnmarkText"
                                    class="showText"
                                    >
                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                    </div>
                                </div>
                                
                            </div>

                            <div class="flex items-center gap-1">
                                <div class="checkbox bounce filterable">

                                    <input type="checkbox"  wire:click="updateTip('radna masina')"  name="tip" id="radna_masina" value="radna_masina" @if ($tip == 'radna masina') checked @endif />

                                    <svg viewBox="0 0 21 21">
                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                    </svg>
                                </div>
            

                                <div 
                                x-data="{showMarkText:false, showUnmarkText:false}"
                                class="flex items-center w-full oznaci-kategoriju relative">
                                    <label for="radna_masina" class="hover:cursor-pointer">Radna mašina</label>


                                    @auth
                                        @if (in_array(4, $markedCategories))
                                            <button 
                                            @mouseover="showUnmarkText = true"
                                            @mouseover.away="showUnmarkText = false"
                                            @click="showUnmarkText = false"
                                            wire:click="updateMarkedCategory(4, {{ auth()->user()->id }})" class="ml-auto">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @else
                                        
                                            <button 
                                            @mouseover="showMarkText = true"
                                            @mouseover.away="showMarkText = false"
                                            @click="showMarkText = false"

                                            wire:click="updateMarkedCategory(4, {{ auth()->user()->id }})" class="ml-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </button>
                                
                                        @endif
                                    @endauth

                                    <div
                                    x-cloak
                                    x-show="showMarkText"
                                    class="showText"
                                    >
                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                    </div>

                                    <div
                                    x-cloak
                                    x-show="showUnmarkText"
                                    class="showText"
                                    >
                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                    </div>
                                </div>
                                
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
    

    <div class="lgMin:w-full">

    
    <!-- Search and sort -->
    <div class="relative flex gap-5 lg:hidden mb-7">

        <div class="grow">
            <x-search />
        </div>


        <div class="relative">
            <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
        </div>
        
    </div>
    <!-- -->


    <!-- Phone filters -->
    <div class="relative flex flex-col gap-5 lgMin:hidden mb-7">

        <div class="flex gap-5">

            <x-back-button class="mb-0"/>

            <div class="grow">
                <x-search />
            </div>
        </div>
        

        <div class="flex gap-5 justify-between relative">


            <div 
            @click.away="showFilters=false"
            class="w-full">
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
                    class="bg-white w-full p-5 rounded-xl absolute left-0 top-16 z-10 shadow-dialog"
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
                            
                                                <div 
                                                x-data="{showMarkText:false, showUnmarkText:false}"
                                                class="flex items-center w-full oznaci-kategoriju relative">
                                                    <label for="masina_za_drvo" class="hover:cursor-pointer">Mašina za drvo</label>

                                                    @auth
                                                        @if (in_array(1, $markedCategories))
                                                            <button 
                                                            @mouseover="showUnmarkText = true"
                                                            @mouseover.away="showUnmarkText = false"
                                                            @click="showUnmarkText = false"

                                                            wire:click="updateMarkedCategory(1, {{ auth()->user()->id }})" class="ml-auto">

                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                        
                                                            <button 
                                                            @mouseover="showMarkText = true"
                                                            @mouseover.away="showMarkText = false"
                                                            @click="showMarkText = false"

                                                            wire:click="updateMarkedCategory(1, {{ auth()->user()->id }})" class="ml-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                                </svg>
                                                            </button>
                                                
                                                        @endif
                                                    @endauth

                                                    <div
                                                    x-cloak
                                                    x-show="showMarkText"
                                                    class="showText"
                                                    >
                                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                                    </div>

                                                    <div
                                                    x-cloak
                                                    x-show="showUnmarkText"
                                                    class="showText"
                                                    >
                                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                                    </div>
                                                </div>
                                            </div>
                                            
                                
                                            <div class="flex items-center gap-1">
                                                <div class="checkbox bounce filterable">

                                                    <input type="checkbox" wire:click="updateTip('masina za metal')"  name="tip" id="masina_za_metal" value="masina za metal" @if ($tip == 'masina za metal') checked @endif />

                                                    <svg viewBox="0 0 21 21">
                                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                    </svg>

                                                </div>
                                                
                                                <div 
                                                x-data="{showMarkText:false, showUnmarkText:false}"
                                                class="flex items-center w-full oznaci-kategoriju relative">
                                                    <label for="masina_za_metal" class="hover:cursor-pointer">Mašina za metal</label>


                                                    @auth
                                                        @if (in_array(2, $markedCategories))
                                                            <button 
                                                            @mouseover="showUnmarkText = true"
                                                            @mouseover.away="showUnmarkText = false"
                                                            @click="showUnmarkText = false"
                                                            wire:click="updateMarkedCategory(2, {{ auth()->user()->id }})" class="ml-auto">

                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                        
                                                            <button 
                                                            @mouseover="showMarkText = true"
                                                            @mouseover.away="showMarkText = false"
                                                            @click="showMarkText = false"

                                                            wire:click="updateMarkedCategory(2, {{ auth()->user()->id }})" class="ml-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                                </svg>
                                                            </button>
                                                
                                                        @endif
                                                    @endauth

                                                    <div
                                                    x-cloak
                                                    x-show="showMarkText"
                                                    class="showText"
                                                    >
                                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                                    </div>

                                                    <div
                                                    x-cloak
                                                    x-show="showUnmarkText"
                                                    class="showText"
                                                    >
                                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="flex items-center gap-1">

                                                <div class="checkbox bounce filterable">

                                                    <input type="checkbox" wire:click="updateTip('masina za plastiku')" name="tip" id="masina_za_plastiku" value="masina za plastiku" @if ($tip == 'masina za plastiku') checked @endif/>

                                                    <svg viewBox="0 0 21 21">
                                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                    </svg>

                                                </div>
                                                <div 
                                                x-data="{showMarkText:false, showUnmarkText:false}"
                                                class="flex items-center w-full oznaci-kategoriju relative">
                                                    <label for="masina_za_plastiku" class="hover:cursor-pointer">Mašina za plastiku</label>


                                                    @auth
                                                        @if (in_array(3, $markedCategories))
                                                            <button 
                                                            @mouseover="showUnmarkText = true"
                                                            @mouseover.away="showUnmarkText = false"
                                                            @click="showUnmarkText = false"
                                                            wire:click="updateMarkedCategory(3, {{ auth()->user()->id }})" class="ml-auto">

                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                        
                                                            <button 
                                                            @mouseover="showMarkText = true"
                                                            @mouseover.away="showMarkText = false"
                                                            @click="showMarkText = false"

                                                            wire:click="updateMarkedCategory(3, {{ auth()->user()->id }})" class="ml-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                                </svg>
                                                            </button>
                                                
                                                        @endif
                                                    @endauth

                                                    <div
                                                    x-cloak
                                                    x-show="showMarkText"
                                                    class="showText"
                                                    >
                                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                                    </div>

                                                    <div
                                                    x-cloak
                                                    x-show="showUnmarkText"
                                                    class="showText"
                                                    >
                                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-1">

                                                <div class="checkbox bounce filterable">

                                                    <input type="checkbox" wire:click="updateTip('radna masina')" name="tip" id="radna_masina" value="radna masina" @if ($tip == 'radna masina') checked @endif/>

                                                    <svg viewBox="0 0 21 21">
                                                        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                    </svg>

                                                </div>
                                                <div 
                                                x-data="{showMarkText:false, showUnmarkText:false}"
                                                class="flex items-center w-full oznaci-kategoriju relative">
                                                    <label for="radna_masina" class="hover:cursor-pointer">Radna mašina</label>


                                                    @auth
                                                        @if (in_array(4, $markedCategories))
                                                            <button 
                                                            @mouseover="showUnmarkText = true"
                                                            @mouseover.away="showUnmarkText = false"
                                                            @click="showUnmarkText = false"
                                                            wire:click="updateMarkedCategory(4, {{ auth()->user()->id }})" class="ml-auto">

                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-redd">
                                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                        
                                                            <button 
                                                            @mouseover="showMarkText = true"
                                                            @mouseover.away="showMarkText = false"
                                                            @click="showMarkText = false"

                                                            wire:click="updateMarkedCategory(4, {{ auth()->user()->id }})" class="ml-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-redd">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                                </svg>
                                                            </button>
                                                
                                                        @endif
                                                    @endauth

                                                    <div
                                                    x-cloak
                                                    x-show="showMarkText"
                                                    class="showText"
                                                    >
                                                        Obavestite me kada se pojave novi oglasi za ovu kategoriju
                                                    </div>

                                                    <div
                                                    x-cloak
                                                    x-show="showUnmarkText"
                                                    class="showText"
                                                    >
                                                        Ne želim više da dobijam obaveštenja za ovu  kategoriju
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        
                                    </div>
                                    <!-- END OF TIP -->


                                    <!-- MESTO -->
                                    <div 
                                    @click.away="showMesta=false"
                                    x-data="{showMesta:false}"
                                    class="flex flex-col gap-2 items-start relative md:max-w-full" style="max-width: 300px;">
                                        <label class="font-semibold text-dark-gray" for="mesto">Mesto</label>
                                        <x-input class="border w-full" wire:model="mesto" @click="showMesta = !showMesta" type="text" name="mesto" id="mesto" autocomplete="off"/>
                                        
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
                                            <p class="font-semibold text-left mb-2">Cena</p>
                                            
                            
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



        <div class="relative grow shrink-0">
            <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
        </div>
            
        </div>
    </div>
    <!-- End of phone filters -->
            

    <div class="space-y-7">
        @if(count($posts) > 0)

        @foreach ($posts as $post)

            <livewire:post-index :post="$post" :wire:key="$post->id" />

        @endforeach

        @if (count($posts))
            <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
        @endif

        @else
            <div class="w-full flex flex-col gap-4 rounded-2xl p-5 bg-white justify-center items-center shadow-card">
                
                
                <p class=" text-red-500">Trenutno nema aktivnih oglasa. Pogledajte ponovo kasnije.</p>

            </div>
        @endif
    </div>
    

    </div>



    
</div>
