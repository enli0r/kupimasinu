<div>
    @foreach ($posts as $post)
        <livewire:post-index :post='$post' :wire:key="$post->id">
    @endforeach

    @if (count($posts))
        <div class="livewire-pagination lg:flex lg:justify-center">{{ $posts->links('pagination.livewire-pagination-links') }}</div>
    @endif
</div>
