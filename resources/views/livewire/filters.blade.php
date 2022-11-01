<div>
    
    <!-- For phone -->
    <div class="flex flex-col gap-7 mdMin:hidden z-100 ">
        <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-left">
                Tip mašine
            </h2>
            
            <div class="flex flex-col justify-center gap-3">
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="tip" id="masina_za_drvo" value="masina za drvo" />
                    <label for="masina_za_drvo">Mašina za drvo</label>
                </div>
                
    
                <div class="flex items-center gap-1">
                    <input type="checkbox" name="tip" id="masina_za_metal" value="masina za metal" />
                    <label for="masina_za_metal">Mašina za metal</label>
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
                

                <div class="flex justify-between">
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

        
    
        
    
        {{-- <div class="flex  gap-5 justify-center items-center">
    
            <form action="" method="POST" class="flex gap-7 justify-center">
                @csrf
                <div class="flex gap-5 items-center justify-center">
                    <input wire:model="cena_od" type="number" name="cena_od" id="cena_od" class="w-20 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300" placeholder="Cena od"/>
                    <p>&euro;</p>
                </div>
                
                <div class="flex gap-1 items-center">
                    <input wire:model="cena_do" type="number" name="cena_do" id="cena_do" class="w-20 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300" placeholder="Cena do"/>
                    <p>&euro;</p>
                </div>
                
            </form>
            
        </div> --}}
    
        
    
        {{-- <div class="flex flex-col gap-3 justify-center">
            <h2 class="font-semibold text-center">
                Godište
            </h2>
    
            <form action="" method="post" class="flex gap-7 justify-center">
                @csrf
    
                <div class="flex gap-1 items-center">
                    <input wire:model='godina_od' type="number" name="godina_od" id="godina_od" class="w-24 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300" placeholder="Godina od"/>
                </div>
    
                <div class="flex gap-1 items-center">
                    <input wire:model='godina_do' type="number" name="godina_do" id="godina_do" class="w-24 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300" placeholder="Godina do"/>
                </div>
                
                
            </form>
        </div> --}}
    
        
    
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
    
    
    <!-- For desktop -->
    <div class="flex flex-col gap-5 md:hidden">
        <div class="border">
            <h2 class="font-semibold">
                Tip
            </h2>
            
            <div>
                <button wire:click="setTip('masina za drvo')">Masina za drvo</button>
            </div>
    
            <div>
                <button wire:click="setTip('masina za metal')">Masina za metal</button>
            </div>
        </div>
    
        <div class="border">
            <h2 class="font-semibold">
                Cena
            </h2>
    
            <form action="" method="POST">
                @csrf
                <label for="cena_od">Cena od:</label>
                <input wire:model="cena_od" type="number" name="cena_od" id="cena_od"/>
                <label for="cena_do">Cena do:</label>
                <input wire:model="cena_do" type="number" name="cena_do" id="cena_do"/>
            </form>
            
        </div>
    
        <div class="border">
            <h2 class="font-semibold">
                Godina
            </h2>
    
            <form action="" method="post">
                @csrf
                <label for="godina_od">Godiste od:</label>
                <input wire:model='godina_od' type="number" name="godina_od" id="godina_od"/>
                <label for="godina_od">Godiste do:</label>
                <input wire:model='godina_do' type="number" name="godina_do" id="godina_do"/>
            </form>
        </div>
    
        <div class="border">
            <h2 class="font-semibold">
                Koriscenost
            </h2>
    
            <button wire:click="setKoriscenost('polovno')">Polovna</button>
            <button wire:click="setKoriscenost('novo')">Nova</button>
        </div>
    
        <div class="border">
            <h2 class="font-semibold">
                Ispravnost
            </h2>
    
            <button wire:click="setIspravnost('ispravno')">Ispravna</button>
            <button wire:click="setIspravnost('neispravno')">Neispravna</button>
        </div>
    
        <div class="border">
            <h2 class="font-semibold">
                Zamena
            </h2>
    
            <button wire:click="setZamena('da')">Da</button>
            <button wire:click="setZamena('ne')">Ne</button>
        </div>
    
    
    </div>
    </div>
    
    
    