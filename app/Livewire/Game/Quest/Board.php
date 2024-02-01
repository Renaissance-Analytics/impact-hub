<?php

namespace App\Livewire\Game\Quest;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('layouts.uc')]
#[Title('Quest Board')]
class Board extends Component
{
    public function render()
    {
        abort(404);
        return view('livewire.game.quest.board');
    }
}
