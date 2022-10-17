<div class="space-y-5">
        @foreach ($posts as $post)

            <livewire:post-index :post="$post" :wire:key="$post->id">

        @endforeach

        <button wire:click="refresh()">Refresh</button>

        @if (count($posts))
            {{ $posts->links() }}
        @endif

</div>
