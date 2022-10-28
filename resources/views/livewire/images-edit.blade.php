<div>
    <input wire:model="images" type="file" name="images[]" multiple/>
        
    @error('images')
        <small class="text-red-500 font-semibold">*{{ $message }}</small>
    @enderror

    @if($images)
        @foreach ($images as $image)
            @if ($image->exists())
                <img wire:click="removeTempImage('{{ $image->getFilename() }}')" src="{{ asset('livewire-tmp/'.$image->getFilename()) }}" alt="" />           
            @endif
        @endforeach
    @endif


    @foreach ($postImagesToRemove as $postImageToRemove)
        <p>{{ $postImageToRemove }}</p>
    @endforeach

    


    @foreach ($postImages as $postImage)
        @if (in_array($postImage->link, $postImagesToRemove) == false)
            <img wire:click="removePostImage({{ $postImage }})" src="{{ asset('post-images/'.$postImage->link) }}" alt="">
        @endif
    @endforeach

</div>
