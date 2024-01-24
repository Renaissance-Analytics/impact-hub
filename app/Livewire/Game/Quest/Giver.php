<?php

namespace App\Livewire\Game\Quest;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('components.layouts.uc')]
#[Title('Quest Giver')]
class Giver extends Component
{
    public function render()
    {
        abort(404);
        return view('livewire.game.quest.giver');
    }
}
