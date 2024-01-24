<div class="flex justify-center hscreen">
<x-card title="Login" shadow class="w-96" shadow-xl>
    <x-slot:subtitle>
        <p class="mt-4">
            Don't have an account? <a href="/register" class="text-blue-500 hover:text-blue-700">Create one</a>
        </p>
    </x-slot:subtitle>
    <x-form wire:submit.prevent="login">

        <x-input label="Email" wire:model.lazy="email" type="email" />
        <x-input label="Password" wire:model.lazy="password" type="password" />
        <x-checkbox label="Remember me" wire:model.lazy="remember" />
        
        <x-button label="Login" type="submit" class="btn-primary" spinner="login" />
        
    </x-form>

</x-card>
</div>