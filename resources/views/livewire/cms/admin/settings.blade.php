<div class="container">
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="p-6">
        {{-- Basic Settings Section --}}
        <x-header title="Basic" subtitle="App Settings" separator />
        
            <x-input label="App Name" wire:model.defer="settingsForm.app_name" maxlength="12" wire:blur="updateSetting('app_name')" wire:dirty.class="border-yellow-500" />
            <x-textarea label="Description" wire:model.defer="settingsForm.description" rows="4" wire:blur="updateSetting('description')" wire:dirty.class="border-yellow-500" />
            <x-toggle label="Allow Registration" wire:model.defer="settingsForm.allow_registration" wire:blur="updateSetting('allow_registration')" wire:dirty.class="border-yellow-500" />
            
        

        {{-- Brand Settings Section --}}
        <x-header title="Brand" subtitle="Brand Settings" separator class="mt-8" />
        
            <x-input label="Brand Name" wire:model.defer="settingsForm.brand_name" wire:blur="updateSetting('brand_name')" maxlength="12" wire:dirty.class="border-yellow-500"  />
            <x-file label="Full Logo" wire:model.defer="settingsForm.full_logo" accept="image/png, image/jpeg" wire:blur="updateSetting('full_logo')" wire:dirty.class="border-yellow-500" />
            <x-file label="Icon Logo" wire:model.defer="settingsForm.icon_logo" accept="image/png, image/jpeg" wire:blur="updateSetting('icon_logo')" wire:dirty.class="border-yellow-500" />
            <x-file label="FavIcon" wire:model.defer="settingsForm.favicon" accept="image/png, image/jpeg" wire:blur="updateSetting('favicon')" wire:dirty.class="border-yellow-500" />
            <x-input label="Tagline" wire:model.defer="settingsForm.tagline"  maxlength="255" wire:blur="updateSetting('tagline')" wire:dirty.class="border-yellow-500"  />
            <div class="grid grid-cols-3 gap-4">
                <x-input label="Primary Color" wire:model.defer="settingsForm.primary_color" type="color" wire:blur="updateSetting('primary_color')" wire:dirty.class="border-yellow-500"  />
                <x-input label="Secondary Color" wire:model.defer="settingsForm.secondary_color" type="color" wire:blur="updateSetting('secondary_color')" wire:dirty.class="border-yellow-500"  />
                <x-input label="Tertiary Color" wire:model.defer="settingsForm.tertiary_color" type="color" wire:blur="updateSetting('tertiary_color')" wire:dirty.class="border-yellow-500"  />
            </div>
            
        
    </div>
</div>
