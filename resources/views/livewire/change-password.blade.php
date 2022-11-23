<div x-data="{showPassword:false}">
    <div 
    x-cloak
    x-show="showPassword"
    class="showPassword">
        <div 
        @click.away="showPassword=false"
        class="showPassword-cont">

            <button
            @click="showPassword=false"
            class="exitPassword">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
            


            <h1 class="text-lg font-semibold text-center mb-5">Promenite svoju šifru</h1>


            <form wire:submit.prevent="changePassword" action="" method="POST">
                @csrf
                
                <div class="flex flex-col gap-1">
                    <label for="old_pass" class="font-semibold text-dark-gray">Stara šifra</label>
                    <x-input wire:model="old_pass" type="password" name="old_pass" class="w-full"/>
                    @error('old_pass')
                        <p class="text-redd">*{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="new_pass" class="font-semibold text-dark-gray">Nova šifra</label>
                    <x-input wire:model="new_pass" type="password" name="new_pass" class="w-full"/>
                    @error('new_pass')
                        <p class="text-redd">*{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="flex flex-col gap-1">
                    <label for="new_pass_confirm" class="font-semibold text-dark-gray">Ponovite novu šifru</label>
                    <x-input wire:model="new_pass_confirm" type="password" name="new_pass_confirm" class="w-full"/>
                    @error('new_pass_confirm')
                        <p class="text-redd">*{{ $message }}</p>
                    @enderror
                </div>
                

                <button type="submit">Potvrdi</button>
            </form>
        </div>
    </div>


    <div class="w-full bg-dark-gray text-whitee rounded-2xl flex flex-col gap-4 items-start justify-start mb-5">

        <div class="p-5 flex flex-col gap-3">
            <h1 class="text-3xl font-semibold text-redd">{{ $user->name }} @if ($user->is_admin === 1)
                <span class="text-whitee">(</span>ADMIN<span class="text-whitee">)</span>
            @endif</h1>
        
            @auth
                @if (auth()->user()->id == $user->id)
                    <h2 class="text-whitee text-lg font-semibold">{{ $user->email }}</h2>
                @endif
            @endauth
    
    
            <p class="text-md text-white">ID korisnika: {{ $user->id }}</p>
    
            <p class="text-md text-whitee">Član od: {{ date('d.m.Y', strtotime($user->created_at)) }}</p>


            @auth
                @if (auth()->user()->id == $user->id)
                    <hr>


                    <div class="hover:cursor-pointer">
                        <a 
                        @click="showPassword=true"
                        class="text-white nav-link-black text-left prom-sifru">Promenite šifru</a>
                    </div>
                    
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            
                            <button class="text-md text-redd nav-link-red">Odjavite se</button>
                        </form>
                    
                @endif
            @endauth

        </div>
    </div>
</div>
