<?php

namespace App\Livewire\Game\Guild;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('components.layouts.uc')]
#[Title('GList')]
class GList extends Component
{
    public function render()
    {
        abort(404);
        return view('livewire.game.guild.g-list');
    }
}
