@props(['redirect'=>false, 'messageToDisplay' => ''])

<div
x-cloak
    x-data=
    "{
        showNotif:false,
        messageToDisplay:'{{ $messageToDisplay }}',
        show(message){
            setTimeout(() =>{
                this.showNotif=false;
            }, 5000);
            this.messageToDisplay=message
            this.showNotif=true;
        }
        
    }"
    x-init="

    @if($redirect)
        $nextTick(() => show(messageToDisplay));
    @else
        Livewire.on('postWasCreated', message =>{
            show(message);
        });

        Livewire.on('postWasEdited', message =>{
            show(message);
        });

        Livewire.on('commentWasEdited', message =>{
            show(message);
        });

        Livewire.on('commentWasDeleted', message =>{
            show(message);
        });
    @endif
">
    <div
    x-cloak
    x-show="showNotif"

    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-10"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-out duration-150"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-10"

    class="notification">
        <div class="notification-img-cont">
            <img src="{{ asset('images/sivo.png') }}" alt="" class="h-12 w-auto">
        </div>

        <div class="notification-text">
            <p x-text="messageToDisplay"></p>
        </div>

        <!-- X BUTTON -->
        <button
        @click="showNotif = false"
        class="position absolute" style="top: -15px; right:-15px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-redd bg-body-bg rounded-full p-1">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
        </button>
        <!---->
                
    </div>

</div>