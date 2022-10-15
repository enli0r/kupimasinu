<div>
    Hello from livewire

    @foreach ($posts as $post)
        <livewire:post-index :post="$post"/>
    @endforeach
</div>
