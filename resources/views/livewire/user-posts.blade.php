<div
    class="space-y-7"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>
    @if (count($posts))
        @foreach ($posts as $post)
            <livewire:post-index :wire:key="$post->id" :post='$post' />
        @endforeach
    @else
        <p class="w-full flex rounded-xl py-3 bg-white justify-center items-center text-red-500">Trenutno nemate aktivnih oglasa!</p>
    @endif
    

    {{ $posts->links('pagination.livewire-pagination-links') }}
</div>
