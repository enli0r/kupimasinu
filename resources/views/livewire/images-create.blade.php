<div class="w-full space-y-5">
    @if (count($images))
        @foreach ($images as $img)
            <p class="text-white">{{ $img->getClientOriginalName() }}</p>
        @endforeach

    @endif
    

    <div class="w-full flex justify-center items-center">
        <label for="images" class="flex gap-1 items-center justify-center py-2 px-3 bg-redd hover:bg-red-600 lg:bg-dark-gray lg:hover:bg-black text-whitee hover:text-white rounded-full w-48 uppercase font-semibold hover:cursor-pointer">

            Dodajte slike
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        
        
    </label>
    </div>
    

    <input wire:model="images" id="images" type="file" name="images[]" multiple class="hidden"/>
        
    @error('images')
        <small class="text-red-500 font-semibold">*{{ $message }}</small>
    @enderror

    @if($images)
        <div class="w-full space-y-5">
            @foreach ($imagesToUpload as $image)
                @if (!(in_array($image->getFilename(), $removeTempList)))
                    <div class="w-full relative">
                        <img src="{{ $image->temporaryUrl() }}" alt="" class="temp-image rounded-xl"/>

                        <div 
                        wire:click="removeTemp('{{ $image->getFilename() }}')"
                        class="position absolute hover:cursor-pointer" style="top: -12px; right:-12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-redd bg-dark-gray lg:bg-white rounded-full p-1">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

</div>
