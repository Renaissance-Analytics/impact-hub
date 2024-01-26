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

    public $settingsForm = [];

    public function rules()
    {
        $rules = [];
        foreach ($this->settings as $setting) {
            $field = 'settingsForm.' . camel_case($setting->key);
            $rules[$field] = $setting->type;
        }
        return $rules;
    }

    public function mount()
    {
        // Load all settings from the database
        $this->settings = new Setting();

        // Set the default values for the settings
        $this->settings->each(function ($setting) {
            $this->settingsForm[$setting->key]  = $setting->value;
        });
        //dd($this->settings->appName);
    }

    public function updateSetting($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            $setting->value = $this->settingsForm[$key];
            $setting->save();
            $this->success('Setting updated successfully.');
        } else {
            $this->error('Setting not found.');
        }
    }
    
    public function render()
    {
        return view('livewire.cms.admin.settings');
    }
}
