<?php

namespace App\Livewire\Cms\Admin;

use Livewire\Component;

use App\Models\Setting;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

#[Layout('layouts.x')]
#[Title('Settings')]
class Settings extends Component
{

    use Toast;
    use WithFileUploads;

    public $showAddSettingModal = false;
    public $newSetting = [];

    public $appSettings;
    public $allSettings;

    public $settingsForm = [];
    public $formGroups = [];
    public $previews = [];

    public $mimeTypes = [
                'gif' => 'image/gif',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'bmp' => 'image/bmp',
                'webp' => 'image/webp',
                'svg' => 'image/svg+xml',
                'ico' => 'image/x-icon',
                'pdf' => 'application/pdf',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xls' => 'application/vnd.ms-excel',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'ppt' => 'application/vnd.ms-powerpoint',
                'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'txt' => 'text/plain',
                'csv' => 'text/csv',
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
            ];

    public function rules()
    {
        $rules = [];
        $this->appSettings->each(function($setting) {
            $field = 'settingsForm.' . $setting->key;
            $rules[$field] = $setting->type;
        });
        return $rules;
    }

    public function mount()
    {
        // Load all settings from the database
        $this->appSettings = new Setting();


        // Set the default values for the settings
        $this->appSettings->each(function ($setting) {

            //get field type
            $ftype = $this->getType($setting->type);
            switch (true) {
                case $ftype === 'boolean':
                    $setting->value = boolval($setting->value);
                    break;

                case $ftype === 'array':
                    $setting->value = json_decode($setting->value);
                    break;
                case ($ftype === 'image' || $setting->key === 'favicon'):
                    $setting->value = $setting->value;
                    $this->previews[$setting->key] = [
                        'old' => $setting->value,
                        'path' =>$setting->value,
                        'changed' => false];
                    break;
                default:
                    $setting->value = (string) $setting->value;
                    break;
            }
            $this->settingsForm[$setting->key] = $setting->value;
            $this->formGroups[$setting->setting_group][] = $setting->key;
            $this->allSettings[$setting->key] = $setting;
        });

    }
    public function openSettingModal()
    {
        $this->newSetting = [
            'setting_group' => '',
            'key' => '',
            'value' => '',
            'type' => '',
            'tooltip' => '',
        ];
        $this->showAddSettingModal = true;
    }
    public function addNewSetting()
    {
        // Validate the new setting data
        $this->validate([
            'newSetting.setting_group' => 'required',
            'newSetting.key' => 'required',
            'newSetting.value' => 'required',
            'newSetting.type' => 'required',
            'newSetting.tooltip' => 'required',
        ]);

        // Add the new setting to your settings store
        // This will depend on how you're storing your settings

        //TODO: Add the new setting to the database (copy Updating code)

        // Reset the form and close the modal
        $this->newSetting = [];
        $this->showAddSettingModal = false;
        $this->success('Setting added successfully.');
    }

    private function getType($type)
    {
        $typeVals = explode('|', $type);
        if(count($typeVals) > 1) {
            return $typeVals[0];
        }
        else {
            return $type;
        }
    }

    public function updateSetting($key)
    {

        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            //$this->validate('settingsForm.' . $key, $setting->type);
            if ($this->getType($setting->type) === 'image' || $this->getType($setting->type) === 'file') {
                $setting->value = $this->settingsForm[$key]->store('cms/settings', 'public');
            }else{
                $setting->value = $this->settingsForm[$key];
            }
            $setting->update();
            $this->previews[$key]['changed'] = false;
            $this->success('Setting updated successfully.');
        } else {
            $this->error('Setting not found.');
        }
    }

    public function resetImage($key)
    {
        $this->settingsForm[$key] = $this->previews[$key]['old'];
        $this->previews[$key]['changed'] = false;
        $this->previews[$key]['path'] = $this->previews[$key]['old'];
        $this->reset('settingsForm.' . $key);
    }

    //Delete a setting image
    public function deleteImage($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            $setting->value = null;
            $this->previews[$key]['changed'] = true;
            $this->previews[$key]['path'] = null;
            $setting->save();
            $this->success('Setting image deleted successfully.');
        } else {
            $this->error('Setting not found.');
        }
    }

    public function updating($name, $value)
    {
        //Get key from name string
        $key = str_replace('settingsForm.', '', $name);
        //Check if the setting is an image or file
        $ftype = $this->getType($this->allSettings[$key]->type);
        if($ftype == 'image' || $key == 'favicon'){
            $this->previews[$key]['changed'] = true;
            $this->previews[$key]['path'] = $value->temporaryUrl();
        }
    }

    public function render()
    {
        return view('livewire.cms.admin.settings');
    }
}
