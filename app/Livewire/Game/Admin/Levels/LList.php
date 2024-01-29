<?php

namespace App\Livewire\Game\Admin\Levels;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('layouts.x')]
#[Title('Levels')]
class LList extends Component
{
    public function render()
    {
        return view('livewire.game.admin.levels.l-list');
    }
}
