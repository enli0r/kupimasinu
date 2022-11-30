<!-- BACK BUTTON -->
<div>
    <form action="{{ URL::previous() }}">
        <button {{ $attributes->merge(['class' => 'mb-5 bg-dark-gray text-whitee rounded-2xl p-3 flex justify-center gap-1 items-center shadow-card w-32 hover:bg-black hover:text-white transition-all']) }} type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
              
            Povratak
        </button>
    </form>
</div>

<!---->