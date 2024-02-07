<?php

namespace App\Livewire\Game\Admin;


use App\Livewire\Game\Admin\BaseAdmin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.admin')]
#[Title('Dashboard')]
class Dash extends BaseAdmin
{



    public function render()
    {
        return view('livewire.game.admin.dash');
    }
}
