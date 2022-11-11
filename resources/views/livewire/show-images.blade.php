<div class="showImagesContainer">   

        <!-- Arrows -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 prev arrow">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 next arrow">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        <!-- End of arrows -->

        <!-- Slider -->
        <div  class="showImagesSlider">
            @foreach ($post->images as $image)
                <div class="img-and-text">
                    <div class="img-cont">
                        <img src="{{ asset('post-images/'.$image->link) }}" alt="" class="">
                    </div>
                    <p class="text-center text-white mt-10 lgMin:text-lg">Slika: {{ $loop->iteration }}/{{ $loop->count }}</p>
                </div>

                    


                

            @endforeach
        </div>
        <!-- End of slider -->
        
    
    
</div>
