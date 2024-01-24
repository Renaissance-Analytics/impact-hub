<?php

namespace App\Livewire\Account;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('components.layouts.uc')]
#[Title('Register Account')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.account.register');
    }
}
