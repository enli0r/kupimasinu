<x-app-layout>
    @auth
        @if (auth()->user()->email_verified_at == null && $user->id === auth()->user()->id)
            <x-verify-email />
        @endif
    @endauth

    <livewire:change-password :user='$user'/>

    <livewire:user-posts :user='$user' />
</x-app-layout>