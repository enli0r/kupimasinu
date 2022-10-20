<div
    class="space-y-7"
    x-init="window.livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    })"
>
    @foreach ($posts as $post)
        <livewire:post-index :wire:key="$post->id" :post='$post' />
    @endforeach

    {{ $posts->links('pagination.livewire-pagination-links') }}
</div>
