<?php

namespace App\Livewire\Account;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('components.layouts.uc')]
#[Title('MyAccount')]
class MyAccount extends Component
{
    public function render()
    {
        abort(404);
        return view('livewire.account.my-account');
    }
}
