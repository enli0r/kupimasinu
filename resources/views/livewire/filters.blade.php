<div>
    
    <!-- For phone -->
    <div class="flex flex-col gap-7 z-100">
        <h3 class="text-redd text-lg font-semibold lg:hidden">Filteri</h3>

        <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-left">
                Tip mašine
            </h2>
            
            <div class="flex flex-col justify-center gap-3">
    
                <div class="flex items-center gap-1">
                    <input type="radio"  wire:click="updateTip('masina za drvo')"  name="tip" id="masina_za_drvo" value="masina za drvo" 
                    
                    @if ($tip == 'masina_za_drvo')
                        checked
                    @endif/>

                    <label for="masina_za_drvo">Mašina za drvo</label>
                </div>
                
    
                <div class="flex items-center gap-1">
                    <input type="radio"  wire:click="updateTip('masina za metal')"  name="tip" id="masina_za_metal" value="masina za metal" 
                    @if ($tip == 'masina_za_metal')
                        checked
                    @endif

                    />
                    <label for="masina_za_metal">Mašina za metal</label>
                </div>

                <div class="flex items-center gap-1">
                    <input type="radio" wire:click="updateTip('masina za plastiku')" name="tip" id="masina_za_plastiku" value="masina za plastiku"
                    @if ($tip !== 'masina_za_plastiku')
                        checked
                    @endif
                    />
                    <label for="masina_za_plastiku">Mašina za plastiku</label>
                </div>
            </div>
            
        </div>
    
        <div>            


            <div class="range-slider flex flex-col">
                <p class="font-semibold text-left mb-7">Cena</p>


                <div class="slider-wrapper mb-5">
                    <input value="0" min="0" max="2000" step="1" type="range">
                    <input value="1000" min="0" max="2000" step="1" type="range">
                </div>
                

                <div class="flex justify-between mdMin:flex-col mdMin:gap-2">
                    <div class="flex gap-1 items-center">
                        <label for="cena_od">Od:</label>
                        <input id="cena_od" type="number" value="0" min="0" max="2000" step="1" class="border rounded-lg p-1 px-2"> 
                        <p>&euro;</p>
                    </div>
                    
                    <div class="flex gap-1 items-center">
                        <label for="cena_do">Do:</label>
                        <input id="cena_do" type="number" value="2000" min="0" max="2000" step="1" class="border rounded-lg py-1 px-2">
                        <p>&euro;</p>
                    </div>
                    
                </div>

            </div>
    
        </div>

    
        
    
        <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-left">
                Korišćenost
            </h2>
    
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="koriscenost" id="polovno" value="polovno" />
                    <label for="polovno">Polovno</label>
                </div>
                
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="koriscenost" id="novo" value="novo" />
                    <label for="novo">Novo</label>
                </div>
    
    
    
                {{-- <button wire:click="setKoriscenost('polovno')" class="px-3 py-2 rounded-lg tip @if($koriscenost == 'polovno') tip-clicked @endif">Polovna</button>
                <button wire:click="setKoriscenost('novo')" class="px-3 py-2 rounded-lg tip @if($koriscenost == 'novo') tip-clicked @endif">Nova</button> --}}
            </div>
            
        </div>
    
        
    
        <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-left">
                Ispravnost
            </h2>
    
            <div class="flex flex-col gap-3">
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="ispravnost" id="ispravno" value="ispravno" />
                    <label for="ispravno">Ispravno</label>
                </div>
                
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="ispravnost" id="neispravno" value="neispravno" />
                    <label for="neispravno">Neispravno</label>
                </div>
    
    
                {{-- <button wire:click="setIspravnost('ispravno')" class="px-3 py-2 rounded-lg tip @if($ispravnost == 'ispravno') tip-clicked @endif">Ispravno</button>
                <button wire:click="setIspravnost('neispravno')" class="px-3 py-2 rounded-lg tip @if($ispravnost == 'neispravno') tip-clicked @endif">Neispravno</button> --}}
            </div>
            
        </div>
    
        
    
    
        <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-left">
                Zamena
            </h2>
    
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="zamena" id="zamena_da" value="da" />
                    <label for="zamena_da">Da</label>
                </div>
                
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="zamena" id="zamena_ne" value="ne" />
                    <label for="zamena_ne">Ne</label>
                </div>
    
    
                {{-- <button wire:click="setZamena('da')" class="px-3 py-2 rounded-lg tip @if($zamena == 'da') tip-clicked @endif">Da</button>
                <button wire:click="setZamena('ne')" class="px-3 py-2 rounded-lg tip @if($zamena == 'ne') tip-clicked @endif">Ne</button> --}}
            </div>
    
            
        </div>
    
    
    </div>
    <!-- -->
    
</div>
    
    
    