
<div class="container">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-header title="App Settings" subtitle="Each setting will save when you tab out of that setting field except file uploads. File uploads will save when you click the checkmark" separator>
        <x-slot name="actions">
            <x-button icon="mdi.plus" wire:click="openSettingModal" class="btn-primary">Add Setting</x-button>
        </x-slot>
    </x-header>
    <x-tabs selected="app">
        {{-- Loop through groups and setup tabs --}}
        @foreach($formGroups as $group => $fields)
            {{-- Show Group Tab --}}
            <x-tab name="{{ $group }}" label="{{ ucwords(str_replace('_', ' ', $group)) }}">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            {{-- Display settings for this tab, but first, figure out what type it is --}}
            @foreach($fields as $key)
                @php
                    //Reset check variables
                    $options = [];
                    $acceptFiles = '';
                    //Get Type String and prepare form field
                    $typeString = explode('|', $allSettings[$key]->type);
                    if(count($typeString) > 1) {
                        $ftype = $typeString[0];
                    } else {
                        $ftype = $allSettings[$key]->type;
                    }
                    
                    if($ftype === ('image' || 'file')) {
                        if(count($typeString) > 1 && in_array('extensions', $typeString)) {
                            $extensions = explode(',', $typeString[1]);
                            $acceptFiles = implode(', ', array_map(function($ext) {
                                $ext = trim($ext);
                                
                                return $mimeTypes[$ext] ?? "application/$ext";
                            }, $extensions));
                        }
                        else {
                            $acceptFiles = 'image/png, image/jpeg';
                        }
                    }elseif($ftype === 'select'){
                        
                        if (count($typeString) > 1 && $typeString[1] === 'obj') {
                            [$selectModel, $idField, $displayField] = explode(':', $typeString[2]);
                            $modelClass = 'App\\Models\\' . ucfirst(Str::camel($selectModel));
                            $options = $modelClass::all()->map(function($model) use ($idField, $displayField) {
                                return ['id' => $model->$idField, 'name' => $model->$displayField];
                            })->toArray();
                        } elseif (count($typeString) > 1 && $typeString[1] === 'opt') {
                            $options = collect(explode(',', $typeString[2]))->map(function($item) {
                                if (str_contains($item, ':')) {
                                    [$value, $text] = explode(':', $item);
                                    return ['id' => $value, 'name' => $text];
                                } else {
                                    $text = ucwords(str_replace('_', ' ', $item));
                                    return ['id' => $item, 'name' => $text];
                                }
                            })->toArray();
                        } else {
                            $options = [];
                        }
                    }
                    
                    
                    
                    $fname = ucwords(str_replace('_', ' ', $key));
                @endphp
            {{-- Now we show field --}}
                <div class="flex items-center align-middle">
                    @if($ftype === 'image' || $key === 'favicon' || $key === 'full_logo' || $key === 'icon_logo' )
                        
                            <x-file label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" hint="{{ $allSettings[$key]->tooltip }}" accept="{{ $acceptFiles }}">
                            
                                <img src="{{ $settingsForm[$key] ? ($previews[$key]['changed'] ? $settingsForm[$key]->temporaryUrl() : asset('storage/'.$previews[$key]['path'])) : '' }}" wire:dirty.class="border-yellow-500" wire:target='settingsForm.{{ $key }}' class="object-cover min-w-8 max-w-140 max-h-16 hover:min-w-10">
                            
                            </x-file>
                            <div class="join" >
                                @if($previews[$key]['changed'])
                                    <x-button icon="mdi.backspace" class="join-item" wire:click="resetImage('{{ $key }}')" />
                                @endif
                                <x-button icon="mdi.check"  class="{{ $previews[$key]['changed'] ? 'bg-yellow-500' : 'bg-green-200' }} join-item" wire:click="updateSetting('{{ $key }}')" />
                                <x-button icon="mdi.delete" class="bg-red-200 join-item" wire:click="deleteImage('{{ $key }}')" />
                            </div>
                        
                    @elseif($ftype === 'file')
                        <x-file label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" accept="{{ $acceptFiles }}" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'hex_color')
                        <x-input label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" type="color" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'boolean')
                        <x-toggle label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'numeric')
                        <x-input label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" type="number" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'date')
                        <x-datetime label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" type="date" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'textarea')
                        <x-textarea label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" rows="4" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                    @elseif($ftype === 'select')
                        
                        @if(!empty($options))
                            
                            <x-select label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" :options="$options" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" />
                        @else
                            <x-alert title="No options found" description="Please check your settings file for the {{ $key }} setting" />
                        @endif

                    @else
                    <x-input label="{{ $fname }}" wire:model.defer="settingsForm.{{ $key }}" hint="{{ $allSettings[$key]->tooltip }}" maxlength="255" wire:blur="updateSetting('{{ $key }}')" wire:dirty.class="border-yellow-500" >
                        <x-slot:append>
                            <x-icon name="mdi.alert-circle" wire:dirty wire:target='settingsForm.{{ $key }}' class="text-yellow-500" />
                            <x-icon name="mdi.check" wire:dirty.remove wire:target='settingsForm.{{ $key }}' class="text-green-500" />
                            
                        </x-slot:append>
                    </x-input>
                    @endif
                </div>
           
                
            @endforeach
            </div>
        </x-tab>
        @endforeach
    </x-tabs>
    <!-- Add New Setting Modal -->
    <x-modal wire:model="showAddSettingModal">
        <x-slot name="title">
            Add New Setting
        </x-slot>

        
            <form wire:submit.prevent="addNewSetting" class="grid grid-cols-1 gap-2 md:gap-4 md:grid-cols-2">
                <x-input label="Group" wire:model="newSetting.setting_group" />
                <x-input label="Key" wire:model="newSetting.key" />
                <x-input label="Type" wire:model="newSetting.type" />
                <x-input label="Tooltip" wire:model="newSetting.tooltip" />
                <x-input label="Default Value" wire:model="newSetting.value" />
                <!-- Add more fields as necessary -->
            </form>
        

        <x-slot:actions>
            <x-button wire:click="addNewSetting" class="bg-green-500">Add Setting</x-button>
        </x-slot:actions>
    </x-modal>
</div>
