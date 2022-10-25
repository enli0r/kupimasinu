<div class="space-y-7"
    x-data="{showFilters:false}"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>

    <div class="flex justify-between gap-5 relative lg:flex-col-reverse">
        <button 
        @click="showFilters =! showFilters"
        class="bg-white rounded-xl  px-5 shadow-card lgMin:hover:bg-gray-100 hover:transition-all w-1/2 lg:w-full lg:py-3 lg:px-5">
            <div class="flex justify-between items-center">
                <p class="font-semibold">Filteri</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </button>

        <div
            x-cloak
            x-show="showFilters"
            class="bg-white w-full p-5 shadow-card rounded-xl mt-5 filters"
        >
            <x-filters />
        </div>

        <div class="w-1/2 lg:w-full">
            <x-search />
        </div>

        <div class="relative">
            <x-sort :sortBy="$sort_by" :sortDirection="$sort_direction"/>
        </div>
       
    </div>

    
    

    @foreach ($posts as $post)

        <livewire:post-index :post="$post" :wire:key="$post->id">

    @endforeach

    @if (count($posts))
        <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
    @endif

</div>
