<?php

namespace App\Livewire\Game\Quest;

use Livewire\Component;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('layouts.uc')]
#[Title('Quest Log')]
class Log extends Component
{
    public function render()
    {
        return view('livewire.game.quest.log');
    }
}
