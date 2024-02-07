<?php

namespace App\Livewire\Game;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Home & Hearth')]
class GameHome extends Component
{
    public function render()
    {
        return view('livewire.game.game-home');
    }
}
