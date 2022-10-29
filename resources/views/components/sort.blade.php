@props(['sortBy', 'sortDirection'])

<div x-data="{showSort:false}">

    <button
        @click="showSort = !showSort"
        @click.away="showSort=false"
        class="bg-white gap-2 shadow-card flex justify-center items-center font-semibold rounded-xl px-4 py-3"
    >
        @if ($sortBy == 'cena' && $sortDirection == 'asc')
            Najjeftinije prvo
        @elseif ($sortBy == 'cena' && $sortDirection == 'desc')
            Najskuplje prvo
        @elseif ($sortBy == 'created_at' && $sortDirection == 'desc')
            Najnovije prvo
        @elseif ($sortBy == 'created_at' && $sortDirection == 'asc')
            Najstarije prvo
        @endif

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <div
    x-cloak
    x-show="showSort"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="origin-top scale-y-0"
    x-transition:enter-end="origin-top scale-y-100"
    x-transition:leave="transition ease-out duration-300"
    x-transition:leave-start="origin-top scale-y-100"
    x-transition:leave-end="origin-top scale-y-0"
    class="flex flex-col z-10 bg-white rounded-xl text-center py-2 mt-14 absolute left-0 top-0 w-full shadow-card sort"

    >
        <a wire:click.prevent="setOrderBy('cena', 'asc')" href="">Najjeftinije prvo</a>
        <a wire:click.prevent="setOrderBy('cena', 'desc')" href="">Najskuplje prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'desc')" href="">Najnovije prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'asc')" href="">Najstarije prvo</a>
    </div>
</div>