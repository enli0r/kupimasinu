<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end gap-1">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="w-10 border text-white rounded-md bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>                          
                </button>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="w-10 border text-black rounded-md bg-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>  
                </button>
            @endif

            @for ($i = 1; $i < $paginator->lastPage() + 1; $i++)
                

                @if ($paginator->currentPage()  == $i)
                    <button 
                        
                        class="w-10 border bg-blue-500 text-white rounded-md py-2">
                        {{ $i }}
                    </button>

                @else    
                    <button 
                        
                        wire:click='gotoPage({{ $i }})'
                        
                        class="w-10 border bg-white text-black rounded-md">
                        {{ $i }}
                    </button>
                    
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="w-10 border text-black rounded-md bg-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                        
                </button>
            @else
                <button class="w-10 border text-white rounded-md bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                        
                </button>
            @endif

        </nav>
    @endif
</div>
