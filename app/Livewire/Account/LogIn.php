<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.game')]
#[Title('Login')]
class LogIn extends Component
{
    public $email;
    public $password;
    public $remember;

    public function login()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials, $this->remember)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->to('/x');
            } else {
                return redirect()->to('/game');
            }
        }

        session()->flash('error', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.account.log-in');
    }
}
