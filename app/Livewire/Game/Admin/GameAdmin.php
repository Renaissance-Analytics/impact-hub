<?php

namespace App\Livewire\Game\Admin;

use Livewire\Component;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Layout('layouts.x')]
#[Title('Game Admin')]
class GameAdmin extends Component
{
    public function render()
    {

        return view('livewire.game.admin.game-admin');
    }
}
