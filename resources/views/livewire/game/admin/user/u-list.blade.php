@php
    
    //Set arrays for livewire components
    $headers = [
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'role', 'label' => 'Role'],
        ['key' => 'type', 'label' => 'Type'],
        ['key' => 'email', 'label' => 'Email'],
        ['key' => 'actions', 'label' => 'Actions', 'class' => 'w-40']
    ];
    
@endphp
<div class="container">
    <div class="grid grid-cols-6 mb-10">
        <x-stat title="Total Users" shadow value="{{ count($users) }}" icon="mdi.account" />
    </div>

    
    <x-table :headers="$headers" :rows="$users" striped with-pagination>
        @scope('header_actions', $header)
            <span>{{ $header['label'] }}</span><x-button icon="mdi.plus" link="/x/users/create" wire:navigate class="btn-primary btn-circle btn-sm mx-5" />

        @endscope
        @scope('cell_name', $user)
            <div class="indicator">
                
                @if($user->tester)
                    <span  class="indicator-item badge badge-secondary badge-xs"></span>
                @endif
                {{ $user->name }}
            </div>
        @endscope
        
        
        @scope('cell_role', $user)
            <span class="badge badge-{{ $user->role == 'supmin' ? 'primary' : 'secondary' }}">{{ $user->role }}</span>
        @endscope

        @scope('cell_type', $user)
            @php
                $typeColor = "badge-" . match($user->type) {
                    'student' => 'info',
                    'entreprenuer' => 'warning',
                    'investor', 'incubator' => 'success',
                    default => 'outline'
                };
            @endphp
            <x-badge class="{{ $typeColor }}" value="{{ $user->type }}" />
        @endscope

        @scope('cell_actions', $user)
           
            <x-button link="/x/users/{{ $user->id}}/edit" wire:navigate class="btn-ghost" icon="mdi.pencil" spinner />
            {{-- <x-button wire:click="edit('{{ $user->id}}')" class="btn-ghost" icon="mdi.pencil" spinner /> --}}
             @if($user->role != 'supmin')
                <x-button wire:click.confirm="delete('{{ $user->id}}')" icon="mdi.account-remove" />
            @endif
        @endscope

    </x-table>
    
    {{-- <livewire:game.admin.user.u-show :user="$editing" :key="$editing_key" /> --}}
</div>