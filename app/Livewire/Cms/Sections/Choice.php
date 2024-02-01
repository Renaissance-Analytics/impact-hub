<?php

namespace App\Livewire\Cms\Sections;

use Livewire\Component;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('layouts.uc')]
#[Title('Choice')]
class Choice extends Component
{
    public function render()
    {
        //Remove when working on this file and change layout attribute above
        abort(404);
        return view('livewire.cms.sections.choice');
    }
}
