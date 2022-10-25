<div class="flex flex-col gap-5">
    <div class="border">
        <h2 class="font-semibold">
            Tip
        </h2>
 
        <button wire:click="setTip('masina za drvo')">Masina za drvo</button>
        <button wire:click="setTip('masina za metal')">Masina za metal</button>
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
