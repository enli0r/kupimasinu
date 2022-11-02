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
    <button class="return-to-top mdMin:hidden shadow-card">
        <svg wire:click="$emit('gotoTop')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
        </svg>
    </button>
    <!-- -->

    <!-- Filters desktop -->
    <div class="lg:hidden filters-desktop shrink-0 sticky">
        <div class="w-full mb-7" style="height: 43px;">

        </div>

        <div class="w-full p-5 shadow-card rounded-2xl z-10 bg-white">


            <livewire:filters :tip="$tip" :koriscenost="$koriscenost" :ispravnost="$ispravnost" :zamena="$zamena"/>
        </div>
    </div>
    <!-- -->
    

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
        {{-- <a href="{{ route('posts.create') }}" class="flex gap-1 justify-center items-center px-2 py-3 shadow-card rounded-2xl font-semibold" style="background: #BA1B1D    ; color: #F7F4F3;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              
            <p class=" uppercase">Novi oglas</p>

        </a> --}}

        
        <div class="grow">
            <x-search />
        </div>

        <div class="flex gap-5 justify-between relative">

            {{-- <button class="flex gap-1 py-3 px-3 rounded-2xl shadow-card items-center" style="background: #BA1B1D    ; color: #F7F4F3;">
                Filteri
    
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
                  
            </button> --}}

           

            {{-- <button class="py-2 w-full flex justify-center items-center rounded-xl" style="background: #ba1b1d; color:#F7F4F3;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button> --}}


            {{-- <button class="py-2 w-full flex justify-center items-center rounded-2xl bg-white text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button> --}}


            <div 
            @click.away="showFilters=false"
            class="w-full">
            <button 
            @click="showFilters = !showFilters"
            class="bg-white rounded-2xl shadow-card px-4 py-3 flex-1 w-full text-redd font-semibold">
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
            

                <livewire:filters :tip="$tip" :koriscenost="$koriscenost" :ispravnost="$ispravnost" :zamena="$zamena" />
            </div>
        </div>



            <div class="relative grow shrink-0">
                <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
            </div>
            
            
        </div>

        
        
        
    </div>
    <!-- -->
            

    <div class="space-y-7">
        @if(count($posts) > 0)

        @foreach ($posts as $post)

            <livewire:post-index :post="$post" :wire:key="$post->id" />

        @endforeach

        @if (count($posts))
            <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
        @endif

        @else

            <p>Trenutno nema oglasa za ovu pretragu.</p>

        @endif
    </div>
    

    </div>



    
</div>
