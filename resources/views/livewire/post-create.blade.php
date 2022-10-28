<div>
    <p class="text-lg text-center font-semibold mb-5">Create page</p>

    <form wire:submit.prevent="store" action="" enctype="multipart/form-data" method="POST" class="bg-white p-5 flex flex-col gap-2">
        @csrf

        <!-- Kategorija -->
        <label>Kategorija</label>

        <label for="kategorija_drvo">Masina za drvo</label>
        <input wire:model="kategorija_id" type="radio" name="kategorija_id" id="kategorija_drvo" value="1" @if (old('kategorija_id') === 1) checked @endif/>


        <label for="kategorija_metal">Masina za metal</label>
        <input wire:model="kategorija_id" type="radio" name="kategorija_id" id="kategorija_metal" value="2" @if (old('kategorija_id') === 2) checked @endif/>


        @error('kategorija_id')
            <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Naziv -->
        <label for="naziv">Naziv:</label>
        <input wire:model="naziv" type="text" name="naziv" id="naziv" value="{{old('naziv')}}"/>

        @error('naziv')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Cena -->
        <label for="cena">Cena:</label>
        <input wire:model="cena" type="number" name="cena" id="cena" value="{{old('cena')}}"/>

        @error('cena')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Godina -->
        <label for="godina">Godina:</label>
        <input wire:model="godina" type="number" name="godina" id="godina" value="{{old('godina')}}"/>
        @error('godina')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Koriscenost -->
        <label>Koriscenost</label>

        <label for="koriscenost_novo">Novo</label>
        <input wire:model="koriscenost" type="radio" name="koriscenost" id="koriscenost_novo" value="0" @if (old('koriscenost') === 0) checked @endif/>

        <label for="koriscenost_polovno">Polovno</label>
        <input wire:model="koriscenost" type="radio" name="koriscenost" id="koriscenost_polovno" value="1" @if (old('koriscenost') === 0) checked @endif/>

        @error('koriscenost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Ispravnost -->
        <label>Ispravnost</label>

        <label for="ispravnost_ispravno">Ispravno</label>
        <input wire:model="ispravnost" type="radio" name="ispravnost" id="ispravnost_ispravno" value="0" @if (old('ispravnost') === 0) checked @endif/>

        <label for="ispravnost_neispravno">Neispravno</label>
        <input wire:model="ispravnost" type="radio" name="ispravnost" id="ispravnost_neispravno" value="1" @if (old('ispravnost') === 1) checked @endif/>

        @error('ispravnost')
            <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Zamenna -->
        <label>Zamena</label>

        <label for="zamena_ne">Ne</label>
        <input wire:model="zamena" type="radio" name="zamena" id="zamena_ne" value="0" @if (old('zamena') === 0) checked @endif/>


        <label for="zamena_da">Da</label>
        <input wire:model="zamena" type="radio" name="zamena" id="zamena_da" value="1" @if (old('zamena') === 1) checked @endif/>

        @error('zamena')
            <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror


        <!-- Proizvodjac -->
        <label for="proizvodjac">Proizvodjac</label>
        <input wire:model="proizvodjac" type="text" name="proizvodjac" id="proizvodjac" value="{{old('proizvodjac')}}"/>

        @error('proizvodjac')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Opis -->
        <label for="opis">Opis</label>
        <textarea wire:model="opis" name="opis" id="opis" cols="30" rows="10">{{old('opis')}}</textarea>

        @error('opis')
            <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Mesto -->
        <label for="mesto">Mesto</label>
        <select wire:model="mesto" name="mesto" id="mesto">
            <option selected>Izaberite mesto</option>
            <x-selectCheck wire:model="mesto" value="jagodina" name="mesto" showToUser="Jagodina"/>
            <x-selectCheck wire:model="mesto" value="beograd" name="mesto" showToUser="Beograd"/>
            <x-selectCheck wire:model="mesto" value="novi_sad" name="mesto" showToUser="Novi sad"/>
            <x-selectCheck wire:model="mesto" value="kragujevac" name="mesto" showToUser="Kragujevac"/>
            <x-selectCheck wire:model="mesto" value="cacak" name="mesto" showToUser="Čačak"/>
            <x-selectCheck wire:model="mesto" value="nis" name="mesto" showToUser="Niš"/>
        </select>
        @error('mesto')
                <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Postanski broj -->
        <label for="postanski_broj">Poštanski broj</label>
        <input wire:model="postanski_broj" type="number" name="postanski_broj" id="postanski_broj" value="{{old('postanski_broj')}}"/>
        @error('postanski_broj')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Kontakt -->
        <label for="kontakt">Kontakt</label>
        <input wire:model="kontakt" type="number" name="kontakt" id="kontakt" value="{{old('kontakt')}}"/>
        @error('Kontakt')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Saglasnost -->
        <label for="saglasnost">Saglasnost</label>
        <input wire:model="saglasnost" type="checkbox" name="saglasnost" id="saglasnost" value="1">
        @error('saglasnost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Tacnost -->
        <label for="tacnost">Garantujem tacnost oglasa</label>
        <input wire:model="garantovanje_tacnosti" type="checkbox" name="garantovanje_tacnosti" id="tacnost" value="1">
        @error('garantovanje_tacnosti')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        
        <livewire:images-create />

        <!-- Submit -->
        <button type="submit">Potvrdi</button>
    </form>

</div>