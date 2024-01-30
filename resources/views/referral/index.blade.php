<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form action="{{ route('referral.store', $referralCode) }}" method="post" class="p-6 text-center space-y-6">
            @csrf
            <p class="text-white">You've been referred by {{ $referralCode->user->name }}</p>
            <div class="flex items-center justify-end mt-4">

                <!-- TEMP Fix for the button -->
                <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Sign up for a special reward') }}
                </button>
                <!-- Conflict with Mary UI / Jetstream button -->
                {{--                <x-button class="ms-4">--}}
                {{--                    {{ __('Register') }}--}}
                {{--                </x-button>--}}
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
