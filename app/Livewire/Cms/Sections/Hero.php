<?php

namespace App\Livewire\Cms\Sections;

use Livewire\Component;

class Hero extends Component
{
    public $section;

    public function mount($section)
    {
        $this->section = $section;
    }

    public function render()
    {
        return view('livewire.cms.sections.hero', ['section' => $this->section]);
    }
}
