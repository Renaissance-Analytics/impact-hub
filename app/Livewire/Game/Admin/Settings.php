<?php

namespace App\Livewire\Game\Admin;

use Livewire\Component;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('components.layouts.x')]
#[Title('Settings')]
class Settings extends Component
{
    public function render()
    {
        return view('livewire.game.admin.settings');
    }
}
