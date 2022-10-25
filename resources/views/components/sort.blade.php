@props(['sortBy', 'sortDirection'])

<div x-data="{showSort:false}">

    <button
        @click="showSort = !showSort"
        class="bg-white flex justify-center items-center py-4 px-5 font-semibold rounded-xl"
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
    </button>

    <div
    x-cloak
    x-show="showSort"
    class="sort flex flex-col gap-2"
    >
        <a wire:click.prevent="setOrderBy('cena', 'asc')" href="">Najjeftinije prvo</a>
        <a wire:click.prevent="setOrderBy('cena', 'desc')" href="">Najskuplje prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'desc')" href="">Najnovije prvo</a>
        <a wire:click.prevent="setOrderBy('created_at', 'asc')" href="">Najstarije prvo</a>
    </div>
</div>