@props(['sortBy', 'sortDirection'])

<div x-data="{showSort:false}">

    <button
        @click="showSort = !showSort"
        @click.away="showSort=false"
        class="bg-white gap-2 shadow-card flex justify-center items-center  rounded-2xl px-4 py-3 font-semibold" style="color:#161A1D;"
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
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
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
    class="flex flex-col z-10 bg-white rounded-xl text-center py-2 mt-14 absolute left-0 top-0 w-full shadow-dialog sort"

    >
    <a wire:click.prevent="setOrderBy('cena', 'asc')" href="" class="hover:bg-gray-200 @if($sortBy== 'cena' && $sortDirection == 'asc') bg-gray-200 @endif">Najjeftinije prvo</a>
        <a wire:click.prevent="setOrderBy('cena', 'desc')" href="" class="hover:bg-gray-200 @if($sortBy== 'cena' && $sortDirection == 'desc') bg-gray-200 @endif">Najskuplje prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'desc')" href="" class="hover:bg-gray-200 @if($sortBy== 'created_at' && $sortDirection == 'desc') bg-gray-200 @endif">Najnovije prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'asc')" href="" class="hover:bg-gray-200 @if($sortBy== 'created_at' && $sortDirection == 'asc') bg-gray-200 @endif">Najstarije prvo</a>
    </div>
</div>