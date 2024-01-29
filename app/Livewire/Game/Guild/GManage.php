<?php

namespace App\Livewire\Game\Guild;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('layouts.uc')]
#[Title('GManage')]
class GManage extends Component
{
    public function render()
    {
        return view('livewire.game.guild.g-manage');
    }
}
