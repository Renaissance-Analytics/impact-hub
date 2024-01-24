<x-guest-layout>
    <div class="flex justify-center hscreen">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
        <x-validation-errors class="mb-4" />
        <x-card title="Login" shadow class="w-96" shadow-xl>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            <x-slot:subtitle>
                <p class="mt-4">
                    {{__("Don't have an account?")}} <a href="/register" class="text-blue-500 hover:text-blue-700">{{__('Create one')}}</a>
                </p>
            </x-slot:subtitle>
            <form method="POST" action="/login">
                @csrf
                <x-input label="{{ __('Email') }}" name="email" type="email" />
                <x-input label="{{ __('Password') }}" name="password" type="password" />
                <x-checkbox label="{{ __('Remember me') }}" name="remember" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button label="{{ __('Log in') }}" type="submit" class="btn-primary" spinner="login" />
                
            </form>

        </x-card>
    </div>
</x-guest-layout>

