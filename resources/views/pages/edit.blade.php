<x-app-layout>
    <p>Edit page</p>

    <form action="{{ route('posts.edit',  $post->slug) }}" enctype="multipart/form-data" method="POST" class="bg-white p-5 flex flex-col gap-2">
        @csrf
        <input type="hidden" name="_method" value="put" />

        <!-- Odobren -->
        <input type="hidden" name="odobren" value="{{ $post->odobren }}" />

        <!-- Korisnik -->
        <input type="hidden" name="korisnik" id="korisnik" value="{{ $post->korisnik_id }}" />
        @error('korisnik')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror 

        <!-- Kategorija -->
        <label>Kategorija</label>
        <label for="kategorija_drvo">Masina za drvo</label>
        <input type="radio" name="kategorija" id="kategorija_drvo" value="1" @if ($post->kategorija_id === 1 ) checked @endif>
        <label for="kategorija_metal">Masina za metal</label>
        <input type="radio" name="kategorija" id="kategorija_metal" value="2" @if ($post->kategorija_id === 2 ) checked @endif>
        @error('kategorija')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Naziv -->
        <label for="naziv">Naziv:</label>
        <input type="text" name="naziv" id="naziv" value="{{ $post->naziv }}"/>
        @error('naziv')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Cena -->
        <label for="cena">Cena:</label>
        <input type="number" name="cena" id="cena" value="{{ $post->cena }}"/>
        @error('cena')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Godina -->
        <label for="godina">Godina:</label>
        <input type="number" name="godina" id="godina" value="{{ $post->godina }}"/>
        @error('godina')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Koriscenost -->
        <label>Koriscenost</label>
        <label for="koriscenost_novo">Novo</label>
        <input type="radio" name="koriscenost" id="koriscenost_novo" value="0" @if ( $post->koriscenost === 0 ) checked @endif/>
        <label for="koriscenost_polovno">Polovno</label>
        <input type="radio" name="koriscenost" id="koriscenost_polovno" value="1" @if ( $post->koriscenost === 1 ) checked @endif/>
        @error('koriscenost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Ispravnost -->
        <label>Ispravnost</label>
        <label for="ispravnost_ispravno">Ispravno</label>
        <input type="radio" name="ispravnost" id="ispravnost_ispravno" value="0" @if ( $post->ispravnost === 0 ) checked @endif/>
        <label for="ispravnost_neispravno">Neispravno</label>
        <input type="radio" name="ispravnost" id="ispravnost_neispravno" value="1" @if ( $post->ispravnost === 1 ) checked @endif/>
        @error('ispravnost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Zamenna -->
        <label>Zamena</label>
        <label for="zamena_ne">Ne</label>
        <input type="radio" name="zamena" id="zamena_ne" value="0" @if ( $post->zamena === 0 ) checked @endif/>
        <label for="zamena_da">Da</label>
        <input type="radio" name="zamena" id="zamena_da" value="1" @if ( $post->zamena === 1 ) checked @endif/>
        @error('zamena')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror


        <!-- Proizvodjac -->
        <label for="proizvodjac">Proizvodjac</label>
        <input type="text" name="proizvodjac" id="proizvodjac" value=" {{ $post->proizvodjac }} "/>
        @error('proizvodjac')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Opis -->
        <label for="opis">Opis</label>
        <textarea name="opis" id="opis" cols="30" rows="10">{{ $post->opis }}</textarea>
        @error('opis')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Mesto -->
        <label for="mesto">Mesto</label>
        <select name="mesto" id="mesto">
            <option value="jagodina" @if ($post->mesto === 'jagodina') selected @endif>Jagodina</option>
            <option value="beograd" @if ($post->mesto === 'beograd') selected @endif>Beograd</option>
            <option value="novi_sad" @if ($post->mesto === 'novi_sad') selected @endif>Novi sad</option>
            <option value="kragujevac" @if ($post->mesto === 'kragujevac') selected @endif>Kragujevac</option>
            <option value="cacak" @if ($post->mesto === 'cacak') selected @endif>Čačak</option>
            <option value="nis" @if ($post->mesto === 'nis') selected @endif>Niš</option>
        </select>
        @error('mesto')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Postanski broj -->
        <label for="postanski_broj">Poštanski broj</label>
        <input type="number" name="postanski_broj" id="postanski_broj" value="{{ $post->postanski_broj }}"/>
        @error('postanski_broj')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Kontakt -->
        <label for="kontakt">Kontakt</label>
        <input type="number" name="kontakt" id="kontakt" value="{{ $post->kontakt }}"/>
        @error('Kontakt')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Saglasnost -->
        <label for="saglasnost">Saglasnost</label>
        <input type="checkbox" name="saglasnost" id="saglasnost" value="1">
        @error('saglasnost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Tacnost -->
        <label for="tacnost">Garantujem tacnost oglasa</label>
        <input type="checkbox" name="tacnost" id="tacnost" value="1">
        @error('tacnost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror

        <!-- Images -->
        <input type="file" name="images[]" multiple/>
        @error('images')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
        @enderror


        <!-- Submit -->
        <button type="submit" name="submit" value="submit">Potvrdi</button>
    </form>

</x-app-layout>