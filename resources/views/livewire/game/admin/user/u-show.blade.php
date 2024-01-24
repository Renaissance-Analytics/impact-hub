@php
    $roles=[
        ['id' => 'admin', 'name' => 'Admin'],
        ['id' => 'user', 'name' => 'User'],
    ];
    $types=[
        ['id' => 'student', 'name' => 'Student'],
        ['id' => 'entreprenuer', 'name' => 'Entrepreneur'],
        ['id' => 'investor', 'name' => 'Investor'],
        ['id' => 'incubator', 'name' => 'Incubator'],
    ];
@endphp
<div class="flex justify-center h-screen">
<x-card class="card-compact">
    <x-form wire:submit.prevent="save">
        
            <h2 class="font-semibold text-xl leading-tight">
                {{ $user->id ? 'Editing '. $name : 'New User' }}
            </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-input label="Name" wire:model.defer="name" />
            <x-input label="Display Name" wire:model="display_name" />
            <x-input label="Email" wire:model.defer="email" />
            <x-input label="Password" wire:model.defer="mod_password" type="password" />
            {{-- <x-input label="Confirm Password" wire:model="user.password_confirmation" type="password" /> --}}
            <x-input label="Company Name" wire:model="company_name" />
        @if($role == 'supmin')
                <label class="block">
                    <span class="text-gray-700">Role</span>
                    <span>Super Admin</span>
                </label>
        @else
            <x-select label="Role" wire:model="role" :options="$roles" placeholder="Pick One" />
        @endif
            <x-select label="Type" wire:model="type" :options="$types" placeholder="Pick One"  />
            <x-toggle label="Tester" wire:model="tester" hint="This user has signed up to be a tester" right tight />
        </div>
        <x-button label="Reset" wire:click="close" />
        <x-button label="Save" type="submit" class="btn-primary" spinner="save" />
    </x-form>
        
</x-card>
</div>