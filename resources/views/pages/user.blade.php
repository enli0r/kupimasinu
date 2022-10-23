<x-app-layout>

    <h1 class="text-xl text-center font-bold">User page</h1>

    <form action="{{ URL::previous() }}">
        <button class="bg-white rounded-xl px-3 py-2 mb-5 flex justify-center gap-2 items-center font-semibold" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Povratak
        </button>
    </form>


    <div class="tab-wrapper" x-data="{ activeTab:  0 }">
        <div class="flex gap-2">
            <button
            @click="activeTab = 0"
            class="tab-control"
            :class="{ 'active': activeTab === 0 }"
            >
                User info
            </button>

            <button
            @click="activeTab = 1"
            class="tab-control"
            :class="{ 'active': activeTab === 1 }"
            >
                User posts
            </button>

            @if ($user->is_admin == 1)
                <button
                @click="activeTab = 2"
                class="tab-control"
                :class="{ 'active': activeTab === 2 }"
                >
                    Zahtevi za odobravanje
                </button>
            @endif

        </div>
      
        <div 
        x-cloak    
        class="tab-panel" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">
            <livewire:user-info :user="$user"/>
        </div>

        <div 
        x-cloak    
        class="tab-panel" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">
            <livewire:user-posts :user="$user"/>
        </div>

        <div 
        x-cloak    
        class="tab-panel" :class="{ 'active': activeTab ===  2}" x-show.transition.in.opacity.duration.600="activeTab === 2">
            <livewire:posts-to-approve />
        </div>

      </div>

</x-app-layout>