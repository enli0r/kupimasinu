<div class="space-y-7" style="min-height: 65vh;"
    x-data="{showFilters:false}"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>
    <!-- Filters -->
    <div class="relative flex gap-5 md:hidden">
        <div class="relative">
            <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
        </div>

        <div @click.away="showFilters=false"
        >
            <button 
            @click="showFilters =! showFilters"
            class="bg-white rounded-xl shadow-card px-4 py-3">
                <div class="flex gap-3 justify-between items-center mdMin:w-40">
                    <p class="font-semibold">Filteri</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
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
                class="bg-white w-full p-5 shadow-card rounded-xl mt-5 absolute left-0 top-9 z-10"
            >
                <x-filters />
            </div>
        </div>
        

        <div class="grow">
            <x-search />
        </div>
    </div>
    <!-- End of filters -->

    <!-- Phone filters -->
    <div class="relative flex flex-col gap-5 mdMin:hidden">
        <div class="flex gap-5">
            <div class="relative grow shrink-0">
                <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
            </div>
            
            <div class="grow">
                <x-search />
            </div>
        </div>

        <div 
        @click.away="showFilters=false"
        class="relative">
            <button 
            @click="showFilters = !showFilters"
            class="bg-white rounded-xl shadow-card px-4 py-3 w-full">
                <div class="flex gap-3 justify-between items-center">
                    <p class="font-semibold">Filteri</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
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
                class="bg-white w-full p-5 shadow-card rounded-xl absolute left-0 top-14 z-10"
            >
                <x-filters />
            </div>
        </div>
        
        
    </div>
    <!-- End of phone filters -->

    @if(count($posts) > 0)

    @foreach ($posts as $post)

        <livewire:post-index :post="$post" :wire:key="$post->id">

    @endforeach

    @if (count($posts))
        <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
    @endif

    @else

        <p>There are currenlty no posts</p>

    @endif

</div>
