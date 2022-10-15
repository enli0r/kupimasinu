<div>
    Hello from livewire

    @foreach ($posts as $post)
        <h2>{{ $post->naziv }}</h2>
        <img src="{{ $post->images()->first()->link }}" alt="">
    @endforeach
</div>
