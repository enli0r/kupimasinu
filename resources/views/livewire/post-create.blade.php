<div class="flex shadow-card rounded-2xl max-w-main mx-auto lg:flex-col mt-10">

    {{-- <div class="bg-dark-gray px-10 py-10 rounded-b-none rounded-t-2xl">
        <h2 class="text-2xl text-whitee text-center ">Postavite svoj oglas</h2>
    </div> --}}

    <div class="bg-white py-12 md:pb-0 px-16 lg:px-5 w-full rounded-l-2xl lg:rounded-l-none lg:rounded-t-2xl">


        <h1 class="text-redd text-3xl lg:text-3xl text-center font-bold mb-16">Unesite podatke za Vaš oglas</h1>

        <form wire:submit.prevent="store" action="" enctype="multipart/form-data" method="POST" class="flex flex-col items-start gap-10 text-dark-gray">
            @csrf

            <!-- Naziv -->
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold" for="naziv">Naziv<span class="text-redd">*</span></label>
                <x-input wire:model="naziv" type="text" name="naziv" id="naziv" value="{{old('naziv')}}" />
        
                @error('naziv')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror
            </div>
            <!---->


            <div class="flex justify-between items-center w-full lg:gap-10 lg:justify-start">
                <!--Cena -->
                <div class="flex flex-col gap-2 w-36">
                    <label class="font-semibold " for="cena">Cena<span class="text-redd">*</span></label>
                    <div class="flex gap-1 items-center">
                        <x-input class="w-full" wire:model="cena" type="number" name="cena" id="cena" value="{{old('cena')}}"/>
                        <p class="text-dark-gray font-semibold">&euro;</p>
                    </div>
            
                    @error('cena')
                                <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                </div>
                <!---->

                <!-- Godina -->
                <div class="flex flex-col gap-2 w-36">
                    <label class="font-semibold" for="godina">Godište<span class="text-redd">*</span></label>
                    <x-input class="w-full" wire:model="godina" type="number" name="godina" id="godina" value="{{old('godina')}}"/>
                    @error('godina')
                                <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                </div>

                <!-- Mesto -->
                <div class="flex flex-col gap-2 items-start lg:hidden">
                    <label class="font-semibold text-dark-gray" for="mesto">Mesto<span class="text-redd">*</span></label>
                    <select wire:model="mesto" name="mesto" id="mesto" class="py-2 px-3 bg-dark-gray hover:bg-black rounded-xl text-whitee hover:cursor-pointer  hover:text-white">
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
                    <!---->
                </div>
                <!---->  
            </div>
            
            <div class="flex w-full lg:flex-col lg:gap-6 lgMin:justify-between">
                 <!-- Mesto -->
                 <div class="flex flex-col gap-2 items-start lgMin:hidden">
                    <label class="font-semibold text-dark-gray" for="mesto">Mesto<span class="text-redd">*</span></label>
                    <select wire:model="mesto" name="mesto" id="mesto" class="py-2 px-3 bg-dark-gray hover:bg-black rounded-xl text-whitee hover:cursor-pointer  hover:text-white">
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
                    <!---->
                </div>
                <!---->  

                <div class="flex justify-start">
                    <!-- Kategorija -->
                    <div class="flex flex-col gap-2 items-start"> 
                        <label class="font-semibold" for="naziv">Kategorija<span class="text-redd">*</span></label>
    
                        <select name="kategorija" id="kategorija" class="lg:w-full py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option value="1" name="kategorija">Mašina za plastiku</option>
                        </select>

    
                        @error('kategorija_id')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
    
    
    
                    {{-- <label class="font-semibold text-dark-gray" for="kategorija_drvo">Masina za drvo</label>
                    <input wire:model="kategorija_id" type="radio" name="kategorija_id" id="kategorija_drvo" value="1" @if (old('kategorija_id') === 1) checked @endif/>
        
        
                    <label class="font-semibold text-dark-gray" for="kategorija_metal">Masina za metal</label>
                    <input wire:model="kategorija_id" type="radio" name="kategorija_id" id="kategorija_metal" value="2" @if (old('kategorija_id') === 2) checked @endif/> --}}
                    <!---->
                </div>

                <div class="flex justify-start">
                    <!-- Koriscenost -->
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="naziv">Korišćenost<span class="text-redd">*</span></label>

    
                        <select name="kategorija" id="kategorija" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option value="1" name="kategorija">Novo</option>
                            <option value="1" name="kategorija">Polovno</option>

                        </select>
                
                        @error('koriscenost')
                                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
    
                    {{-- <label class="font-semibold text-dark-gray" for="koriscenost_novo">Novo</label>
                    <input wire:model="koriscenost" type="radio" name="koriscenost" id="koriscenost_novo" value="0" @if (old('koriscenost') === 0) checked @endif/>
            
                    <label class="font-semibold text-dark-gray" for="koriscenost_polovno">Polovno</label>
                    <input wire:model="koriscenost" type="radio" name="koriscenost" id="koriscenost_polovno" value="1" @if (old('koriscenost') === 0) checked @endif/> --}}
    
                    <!---->
                </div>
                

                
                <div class="flex">
                    <!-- Ispravnost -->
            
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="naziv">Ispravnost<span class="text-redd">*</span></label>


                        <select name="kategorija" id="kategorija" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option value="1" name="kategorija">Ispravno</option>
                            <option value="1" name="kategorija">Neispravno</option>

                        </select>
    
                
                        @error('koriscenost')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
                    
            
                    @error('ispravnost')
                        <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                    <!---->
    
                    {{-- <label class="font-semibold text-dark-gray" for="ispravnost_ispravno">Ispravno</label>
                    <input wire:model="ispravnost" type="radio" name="ispravnost" id="ispravnost_ispravno" value="1" @if (old('ispravnost') === 0) checked @endif/>
            
                    <label class="font-semibold text-dark-gray" for="ispravnost_neispravno">Neispravno</label>
                    <input wire:model="ispravnost" type="radio" name="ispravnost" id="ispravnost_neispravno" value="0" @if (old('ispravnost') === 1) checked @endif/> --}}
                </div>

                

                <div class="flex">

                    <!-- Zamena -->
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="naziv">Zamena<span class="text-redd">*</span></label>

    
                        <select name="kategorija" id="kategorija" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option value="1" name="kategorija">Da</option>
                            <option value="1" name="kategorija">Ne</option>

                        </select>
                
                        @error('koriscenost')
                                <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
                    
            
                    @error('zamena')
                        <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                    <!---->
    
                    {{-- <label class="font-semibold text-dark-gray" for="zamena_ne">Ne</label>
                    <input wire:model="zamena" type="radio" name="zamena" id="zamena_ne" value="0" @if (old('zamena') === 0) checked @endif/>
        
        
                    <label class="font-semibold text-dark-gray" for="zamena_da">Da</label>
                    <input wire:model="zamena" type="radio" name="zamena" id="zamena_da" value="1" @if (old('zamena') === 1) checked @endif/> --}}
                </div>

                
                     
            </div>

            <div class="flex gap-10 lg:flex-col w-full">
                <!-- Proizvodjac -->
                <div class="flex flex-col gap-2 w-1/2 lg:w-full">
                    <label class="font-semibold text-dark-gray" for="proizvodjac">Proizvodjač</label>
                    <x-input wire:model="proizvodjac" type="text" name="proizvodjac" id="proizvodjac" value="{{old('proizvodjac')}}"/>

                    @error('proizvodjac')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                </div>
                <!---->

                <!-- Kontakt -->
                <div class="flex flex-col gap-2 w-1/2 lg:w-full">
                    <label class="font-semibold text-dark-gray" for="kontakt">Kontakt telefon<span class="text-redd">*</span></label>
                    <x-input  wire:model="kontakt" type="number" name="kontakt" id="kontakt" value="{{old('kontakt')}}"/>
            
                    @error('kontakt')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                </div>
                <!---->
            

            </div>
        
             
    
            
            <!-- Opis -->
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold text-dark-gray" for="opis">Opis<span class="text-redd">*</span></label>
                <textarea wire:model="opis" name="opis" id="opis" cols="30" rows="10" class="bg-gray-100 rounded-2xl py-2 px-3" style="resize: none;">{{old('opis')}}</textarea>

                @error('opis')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror
            </div>
            <!---->

           <div class="flex flex-col gap-3">
                <!-- Saglasnost -->
                <div class="flex gap-1 items-center mt-4">
                    <x-checkbox-bounce wire:model="saglasnost" name="saglasnost" id="saglasnost" value="1" />
                    <label class=" text-dark-gray" for="saglasnost">Saglasan sam sa uslovima oglašavanja<span class="text-redd">*</span></label>
                </div>
                @error('saglasnost')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror
                <!-- -->

                <!-- Tacnost -->
                <div class="flex gap-1 items-center mt-2">
                    <x-checkbox-bounce wire:model="garantovanje_tacnosti" name="garantovanje_tacnosti" id="tacnost" value="1" />
                    <label class="text-dark-gray" for="tacnost">Garantujem tacnost oglasa<span class="text-redd">*</span></label>
                </div>
                @error('garantovanje_tacnosti')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror
           </div>
    
            
    
            
    
            <!-- Submit -->
            <div class="w-full flex justify-center items-center lg:hidden">
                <button type="submit" class="bg-redd py-2 px-8 rounded-full text-whitee hover:bg-red-600 hover:text-white">Potvrdi</button>
            </div>
        </form>
    </div>


    <div class="bg-dark-gray lg:bg-white shrink-0 rounded-r-2xl py-12 px-12 lg:rounded-r-none overflow-auto w-88 lg:w-full">
        <livewire:images-create />
    </div>

    <div class="lgMin:hidden w-full bg-white px-5 py-10 rounded-b-2xl">
        <div class="w-full flex justify-center items-center">
            <button type="submit" class="bg-redd py-2 px-8 rounded-full text-whitee hover:bg-red-600 hover:text-white">Potvrdi</button>
        </div>
    </div>

    
</div>