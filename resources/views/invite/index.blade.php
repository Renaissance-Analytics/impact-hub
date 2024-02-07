<x-guest-layout>
    <x-authentication-card class="flex flex-col w-full max-w-screen-lg lg:flex-row">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

    
        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center">
            <form action="{{ route('invite.store', $referralCode) }}" method="post" class="p-6 space-y-6 text-center">
                @csrf
                <p class="text-white">You've been referred by {{ $referralCode->user->name }}</p>
                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Sign up for a special reward') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="divider lg:divider-horizontal">OR</div>
        <div class="grid flex-grow card bg-base-300 rounded-box place-items-center">
            <form action="{{ route('invite.more', $referralCode) }}" method="post" class="p-6 space-y-6 text-center">
                <p class="text-white">Want to explore more about us first?</p>
                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Explore more') }}
                    </button>
                </div>
            </form>
        </div>
    
    </x-authentication-card>
</x-guest-layout>
