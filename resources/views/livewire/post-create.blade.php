<div class="flex shadow-card rounded-2xl max-w-main mx-auto lg:flex-col mt-10">


    <div class="bg-white py-12 px-16 lg:px-5 w-full rounded-l-2xl lg:rounded-l-none lg:rounded-t-2xl lg:rounded-b-2xl">


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
                <div 
                @click.away="showMesta=false"
                x-data="{showMesta:false}"
                class="flex flex-col gap-2 items-start lg:hidden relative">
                    <label class="font-semibold text-dark-gray" for="mesto">Mesto<span class="text-redd">*</span></label>
                    <x-input wire:model="mesto" @click="showMesta = !showMesta" type="text" name="mesto" id="mesto" autocomplete="off" value="{{ old('mesto') }}"/>
                    
                    @error('mesto')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                    

                    <!-- POPUP -->
                    <div 
                    x-cloak
                    x-show="showMesta"
                    class="bg-dark-gray py-2 text-whitee overflow-y-auto shadow-dialog flex flex-col text-center" style="position: absolute; top: -180px; right:0; height:200px; width:180px;">
                        @foreach ($naselja as $mesto)
                            <label @click="showMesta = false" wire:click="updateMesto('{{ $mesto->naziv }}')" class="w-full hover:bg-gray-100 hover:text-dark-gray py-1 hover:cursor-pointer">{{ $mesto->naziv }}</label>
                        @endforeach
                    </div>


                </div>
                <!---->  
            </div>
            
            <div class="flex w-full lg:flex-col lg:gap-6 lgMin:justify-between">
                 <!-- Mesto -->
                 <div 
                 @click.away="showMesta=false"
                    x-data="{showMesta:false}"
                    class="flex flex-col gap-2 items-start lgMin:hidden relative w-full">
                    <label class="font-semibold text-dark-gray" for="mesto">Mesto<span class="text-redd">*</span></label>
                    <x-input class="w-full" wire:model="mesto" @click="showMesta = !showMesta" type="text" name="mesto" id="mesto" autocomplete="off" value="{{ old('mesto') }}"/>
                    
                    @error('mesto')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                    @enderror
                    

                    <!-- POPUP -->
                    <div 
                    x-cloak
                    x-show="showMesta"
                    class="bg-dark-gray py-2 text-whitee overflow-y-auto shadow-dialog flex flex-col text-center" style="position: absolute; top: -180px; right:0; height:200px; width:180px;">
                        @foreach ($naselja as $mesto)
                            <label @click="showMesta = false" wire:click="updateMesto('{{ $mesto->naziv }}')" class="w-full hover:bg-gray-100 hover:text-dark-gray py-1 hover:cursor-pointer">{{ $mesto->naziv }}</label>
                        @endforeach
                    </div>
                    <!---->
                </div>
                <!---->  

                <div class="flex justify-start">
                    <!-- Kategorija -->
                    <div class="flex flex-col gap-2 items-start"> 
                        <label class="font-semibold" for="naziv">Kategorija<span class="text-redd">*</span></label>
    
                        <select wire:model="kategorija_id" name="kategorija_id" id="kategorija" class="lg:w-full py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option selected>Izaberite</option>
                            <option value="1" name="kategorija_id" @if (old('kategorija_id') === 1) selected @endif>Mašina za drvo</option>
                            <option value="2" name="kategorija_id" @if (old('kategorija_id') === 2) selected @endif>Mašina za metal</option>
                            <option value="3" name="kategorija_id" @if (old('kategorija_id') === 3) selected @endif>Mašina za plastiku</option>
                            <option value="4" name="kategorija_id" @if (old('kategorija_id') === 4) selected @endif>Radna mašina</option>
                        </select>

    
                        @error('kategorija_id')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
    
                </div>

                <div class="flex justify-start">
                    <!-- Koriscenost -->
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="koriscenost">Korišćenost<span class="text-redd">*</span></label>

    
                        <select wire:model = "koriscenost" name="koriscenost" id="koriscenost" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option selected>Izaberite</option>
                            <option value="0" name="koriscenost" @if (old('koriscenost') === 0) selected @endif>Novo</option>
                            <option value="1" name="koriscenost" @if (old('koriscenost') === 1) selected @endif>Polovno</option>
                        </select>
                
                        @error('koriscenost')
                                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                

                
                <div class="flex">
                    <!-- Ispravnost -->
            
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="ispravnost">Ispravnost<span class="text-redd">*</span></label>


                        <select wire:model="ispravnost" name="ispravnost" id="ispravnost" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option selected>Izaberite</option>
                            <option value="0" name="ispravnost" @if (old('ispravnost') === 0) selected @endif>Neispravno</option>
                            <option value="1" name="ispravnost" @if (old('ispravnost') === 1) selected @endif>Ispravno</option>
                        </select>
    
                
                        @error('ispravnost')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
                    
                </div>

                

                <div class="flex">

                    <!-- Zamena -->
                    <div class="flex flex-col gap-2 items-start">
                        <label class="font-semibold" for="zamena">Zamena<span class="text-redd">*</span></label>

    
                        <select wire:model="zamena" name="zamena" id="zamena" class="py-2 px-2 bg-dark-gray text-whitee rounded-xl hover:bg-black hover:text-white hover:cursor-pointer ">
                            <option selected>Izaberite</option>
                            <option value="0" name="zamena" @if (old('zamena') === 0) selected @endif>Ne</option>
                            <option value="1" name="zamena" @if (old('zamena') === 1) selected @endif>Da</option>
                        </select>
                
                        @error('zamena')
                            <small class="text-red-500 font-semibold">*{{ $message }}</small>
                        @enderror
                    </div>
                    
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


           <div class="bg-white shrink-0 py-12 px-12 overflow-auto w-full lgMin:hidden">
            <div class="w-full space-y-5">
    
                @error('images')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror

                
                @if($imagesToUpload)
            
                    <div class="rounded-xl space-y-5">
                        @foreach ($imagesToUpload as $imgToUpload)
            
                                <div class="w-full border rounded-xl relative" style="padding-top: 100%;">
            
                                    <div class="absolute top-0 right-0 bottom-0 left-0 p-2 flex items-center justify-center ">
                                        <img src="{{ $imgToUpload->temporaryUrl() }}" alt="" class="post-image rounded-xl"/>
                                    </div>
            
            
                                    <div 
                                    wire:click="removeTemp('{{ $imgToUpload->getClientOriginalName() }}')"
                                    class="position absolute hover:cursor-pointer" style="top: -15px; right:-15px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-redd bg-dark-gray lg:bg-white rounded-full p-1">
                                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
            
                        @endforeach
                    </div>
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
            
            </div>
        </div>
            
    
            
    
            <!-- Submit -->
            <div class="w-full flex justify-center items-center">
                <button type="submit" class="bg-redd py-2 px-8 rounded-full text-whitee hover:bg-red-600 hover:text-white">Postavite ovaj oglas</button>
            </div>





        </form>
    </div>


    <div class="bg-dark-gray lg:bg-white shrink-0 rounded-r-2xl py-12 px-12 lg:rounded-r-none overflow-auto w-88 lg:w-full lg:hidden">
        <div class="w-full space-y-5">

        
            @error('images')
                <small class="text-red-500 font-semibold">*{{ $message }}</small>
            @enderror
        
            @if($imagesToUpload)
        
                <div class="rounded-xl space-y-5">
                    @foreach ($imagesToUpload as $imgToUpload)
        
                            <div class="w-full border rounded-xl relative" style="padding-top: 100%;">
        
                                <div class="absolute top-0 right-0 bottom-0 left-0 p-2 flex items-center justify-center ">
                                    <img src="{{ $imgToUpload->temporaryUrl() }}" alt="" class="post-image rounded-xl"/>
                                </div>
        
        
                                <div 
                                wire:click="removeTemp('{{ $imgToUpload->getClientOriginalName() }}')"
                                class="position absolute hover:cursor-pointer" style="top: -15px; right:-15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-redd bg-dark-gray lg:bg-white rounded-full p-1">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
        
                    @endforeach
                </div>
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
        
        
        </div>
    </div>


    
</div>