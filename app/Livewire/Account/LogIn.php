<?php
//
//namespace App\Livewire\Account;
//
//use Livewire\Component;
//use Illuminate\Support\Facades\Auth;
//
//use Livewire\Attributes\Layout;
//use Livewire\Attributes\Title;
//
//#[Layout('layouts.game')]
//#[Title('Login')]
//class LogIn extends Component
//{
//    public $email;
//    public $password;
//    public $remember;
//    public $demo = true; //change to false to disable demo login
//
//    public function rules()
//    {
//        return [
//            'email' => 'required|email',
//            'password' => 'required',
//        ];
//    }
//
//    public function mount()
//    {
//        if ($this->demo) {
//            $this->email = 'demo@demo.com';
//            $this->password = 'password';
//        }
//    }
//
//    public function login()
//    {
//        $credentials = ['email' => $this->email, 'password' => $this->password];
//
//        if (Auth::attempt($credentials, $this->remember)) {
//            if (Auth::user()->isAdmin()) {
//                return redirect()->to('/x');
//            } else {
//                return redirect()->to('/game');
//            }
//        }
//
//        session()->flash('error', 'Invalid credentials');
//    }
//
//    public function render()
//    {
//        return view('livewire.account.log-in');
//    }
//}
