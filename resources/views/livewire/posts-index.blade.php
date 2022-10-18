<div class="space-y-5"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>

        @foreach ($posts as $post)

            <livewire:post-index :post="$post" :wire:key="$post->id">

        @endforeach

        @if (count($posts))
            <div class="livewire-pagination">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
        @endif

</div>
