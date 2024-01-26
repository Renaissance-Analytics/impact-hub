<?php

namespace App\Livewire\Cms\Admin;

use Livewire\Component;

use App\Models\Setting;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('components.layouts.x')]
#[Title('Settings')]
class Settings extends Component
{

    use Toast;

    public $settings = [];

    public function mount()
    {
        // Load all settings from the database
        $this->settings = Setting::all();

        // Set the default values for the settings
        $this->settings->each(function ($setting) {
            $this->{$setting->key} = $setting->value;
        });
        
    }

    public function updateSetting($key)
    {
        $setting = Setting::firstOrNew(['key' => $key]);
        $setting->value = $this->{$key};
        $setting->save();
        
        $this->success('Setting updated successfully.');
    }
    
    public function render()
    {
        return view('livewire.cms.admin.settings');
    }
}
