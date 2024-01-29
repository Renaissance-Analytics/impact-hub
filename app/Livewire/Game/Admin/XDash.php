<?php

namespace App\Livewire\Game\Admin;


use App\Livewire\Game\Admin\BaseAdmin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.x')]
#[Title('Dashboard')]
class XDash extends BaseAdmin
{



    public function render()
    {
        return view('livewire.game.admin.x-dash');
    }
}
