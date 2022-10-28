<div>
    <input wire:model="images" type="file" name="images[]" multiple/>
        
    @error('images')
        <small class="text-red-500 font-semibold">*{{ $message }}</small>
    @enderror

    @if($images)
        @foreach ($images as $image)
            <img src="{{ $image->temporaryUrl() }}" alt="" />
        @endforeach
    @endif

</div>
