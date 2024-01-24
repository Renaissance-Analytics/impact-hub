<?php

namespace App\Livewire\Game\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BaseAdmin extends Component
{
    public function mount()
    {
        $this->layout = 'layouts.x';
    }

    #[Layout('components.layouts.x')]
    public function render()
    {
       
    }

}