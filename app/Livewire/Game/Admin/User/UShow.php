<?php

namespace App\Livewire\Game\Admin\User;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\User;


use Livewire\Attributes\Layout;

//use Livewire\Attributes\Modelable;

class UShow extends Component
{


    use Toast;


    //#[Modelable]
    public ?User $user = null;
    
    // #[Modelable]
    // public $editing_key;


    //User variables
    public $name;
    public $display_name;
    public $email;
    public $tester;
    public $type;
    public $role;
    public $company_name;
    public $mod_password = null;

    public $password_confirmation;

    //#[Modelable]
    //public $showUser = false;

    
    

    protected array $rules = [
        'name' => 'required|string|max:255',
        'display_name' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255',
        'mod_password' => 'nullable|string|min:8',
        //'user.password_confirmation' => 'string|min:8|same:user.password',
        'tester' => 'boolean',
        'type' => 'string|max:255',
        'role' => 'string|max:255',
        'company_name' => 'nullable|string|max:255',

    ];

    public function rules()
    {
        return $this->rules;
    }

    public function mount(?User $user)
    {
        if($user->id) {
            $this->user = $user;
        } else {
            $this->user = new User; 
        }
        $this->name = $this->user->name;
        $this->display_name = $this->user->display_name;
        $this->email = $this->user->email;
        $this->tester = $this->user->tester;
        $this->type = $this->user->type;
        $this->role = $this->user->role;
        $this->company_name = $this->user->company_name;
        $this->password = null;

        
    }
    

    public function save()
    {
        $validatedData = $this->validate();

        //dd($validatedData);

        if (!empty($this->mod_password)) {
            $validatedData['password'] = bcrypt($this->mod_password);
        } else {
            $validatedData['password'] = $this->user->password;
        }
        unset($validatedData['mod_password']);
        if($this->user->id) {
            $this->user->update($validatedData);
            $this->success('User Updated');
        } else {
            User::create($validatedData);
            $this->success('User Created');
        }
       $this->redirect(route('x.users'));
    }


    #[Layout('components.layouts.x')]
    public function render()
    {
        if($this->user->id) {
            $title = $this->user->name;
        } else {
            $title = 'New User';
        }
        return view('livewire.game.admin.user.u-show')->title($title);
    }
}
