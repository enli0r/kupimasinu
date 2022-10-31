<div>
@props(['tip', 'koriscenost', 'ispravnost', 'zamena'])

<!-- For phone -->
<div class="flex flex-col gap-5 mdMin:hidden z-100">
    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Tip
        </h2>
        
        <div class="flex justify-center gap-7">
            <button wire:click="setTip('masina za drvo')" class="px-3 py-2 rounded-lg tip @if($tip == 'masina za drvo') tip-clicked @endif" >Mašina za drvo</button>

            <button wire:click="setTip('masina za metal')" class="px-3 py-2 rounded-lg tip @if($tip == 'masina za metal') tip-clicked @endif">Mašina za metal</button>
        </div>
        
    </div>

    <hr>

    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Cena
        </h2>

        <form action="" method="POST" class="flex gap-7 justify-center">
            @csrf
            <div class="flex gap-1 items-center">
                <label for="cena_od">Od:</label>
                <input wire:model="cena_od" type="number" name="cena_od" id="cena_od" class="w-16 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300"/>
                <p>&euro;</p>
            </div>
            
            <div class="flex gap-1 items-center">
                <label for="cena_do">Do:</label>
                <input wire:model="cena_do" type="number" name="cena_do" id="cena_do" class="w-16 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300"/>
                <p>&euro;</p>
            </div>
            
        </form>
        
    </div>

    <hr>

    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Godina
        </h2>

        <form action="" method="post" class="flex gap-7 justify-center">
            @csrf

            <div class="flex gap-1 items-center">
                <label for="godina_od">Od:</label>
                <input wire:model='godina_od' type="number" name="godina_od" id="godina_od" class="w-16 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300"/>
            </div>

            <div class="flex gap-1 items-center">
                <label for="godina_od">Do:</label>
                <input wire:model='godina_do' type="number" name="godina_do" id="godina_do" class="w-16 px-2 py-1 outline-1 outline-black rounded-lg border-2 border-gray-300"/>
            </div>
            
            
        </form>
    </div>

    <hr>

    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Koriscenost
        </h2>

        <div class="flex justify-center gap-7">
            <button wire:click="setKoriscenost(0)" class="px-3 py-2 rounded-lg tip @if($koriscenost == 'polovno') tip-clicked @endif">Polovna</button>
            <button wire:click="setKoriscenost(1)" class="px-3 py-2 rounded-lg tip @if($koriscenost == 'novo') tip-clicked @endif">Nova</button>
        </div>
        
    </div>

    <hr>

    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Ispravnost
        </h2>

        <div class="flex justify-center gap-7">
            <button wire:click="setIspravnost('ispravno')" class="px-3 py-2 rounded-lg tip @if($ispravnost == 'ispravno') tip-clicked @endif">Ispravno</button>
            <button wire:click="setIspravnost('neispravno')" class="px-3 py-2 rounded-lg tip @if($ispravnost == 'neispravno') tip-clicked @endif">Neispravno</button>
        </div>
        
    </div>

    <hr>


    <div class="flex flex-col gap-3 justify-center">
        <h2 class="font-semibold text-center">
            Zamena
        </h2>

        <div class="flex justify-center gap-7">
            <button wire:click="setZamena('da')" class="px-3 py-2 rounded-lg tip @if($zamena == 'da') tip-clicked @endif">Da</button>
            <button wire:click="setZamena('ne')" class="px-3 py-2 rounded-lg tip @if($zamena == 'ne') tip-clicked @endif">Ne</button>
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


