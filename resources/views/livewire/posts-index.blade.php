<div>
    <div class="space-y-5">
        @foreach ($posts as $post)
            <livewire:post-index :post="$post"/>
        @endforeach
    </div>
    
</div>
