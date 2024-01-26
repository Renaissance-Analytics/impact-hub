<div class="container">
    {{-- Nothing in the world is as soft and yielding as water. --}}
{{ $settings->app_name }}
    <div class="p-6">
        {{-- Basic Settings Section --}}
        <x-header title="Basic" subtitle="App Settings" separator />
        
            <x-input label="App Name" wire:model.defer="settings.app_name" maxlength="12" wire:blur="updateSetting('app_name')" wire:dirty.class="border-yellow-500" />
            <x-textarea label="Description" wire:model.defer="settings.description" rows="4" wire:blur="updateSetting('description')" wire:dirty.class="border-yellow-500" />
            <x-toggle label="Allow Registration" wire:model.defer="settings.allow_registration" wire:blur="updateSetting('allow_registration')" wire:dirty.class="border-yellow-500" />
            
        

        {{-- Brand Settings Section --}}
        <x-header title="Brand" subtitle="Brand Settings" separator class="mt-8" />
        
            <x-input label="Brand Name" wire:model.defer="settings.brand_name" maxlength="12" />
            <x-file label="Full Logo" wire:model.defer="settings.full_logo" accept="image/png, image/jpeg" />
            <x-file label="Icon Logo" wire:model.defer="settings.icon_logo" accept="image/png, image/jpeg" />
            <x-file label="FavIcon" wire:model.defer="settings.favicon" accept="image/png, image/jpeg" />
            <x-input label="Tagline" wire:model.defer="settings.tagline" maxlength="255" />
            <div class="grid grid-cols-3 gap-4">
                <x-input label="Primary Color" wire:model.defer="settings.primary_color" type="color" />
                <x-input label="Secondary Color" wire:model.defer="settings.secondary_color" type="color" />
                <x-input label="Tertiary Color" wire:model.defer="settings.tertiary_color" type="color" />
            </div>
            
        
    </div>
</div>
