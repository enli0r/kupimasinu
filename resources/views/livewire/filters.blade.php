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

        <form action="">
            @csrf
            <input type="number" name="cena_od" />
            <input type="number" name="cena_do" />
        </form>
        
    </div>

    <div class="border">
        <h2 class="font-semibold">
            Godina
        </h2>

        <form action="">
            @csrf
            <input type="number" name="godina_od" />
            <input type="number" name="godina_do" />
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
