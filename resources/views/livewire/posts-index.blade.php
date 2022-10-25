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
            <livewire:filters />
        </div>

        <div class="w-1/2 lg:w-full">
            <form action="" class="relative">
                <input type="search" placeholder="Search" class="py-3 pr-5 pl-12 rounded-xl w-full shadow-card bg-white search-input">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 search-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                  
            </form>
        </div>

        
    </div>

    
    

    @foreach ($posts as $post)

        <livewire:post-index :post="$post" :wire:key="$post->id">

    @endforeach

    @if (count($posts))
        <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
    @endif

</div>
