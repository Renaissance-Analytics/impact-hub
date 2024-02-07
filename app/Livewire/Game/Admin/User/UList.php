<?php

namespace App\Livewire\Game\Admin\User;

use Livewire\Component;
//use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use Livewire\WithPagination;
use Mary\Traits\Toast;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.admin')]
#[Title('Users')]
class UList extends Component
{
    use WithPagination, Toast;



    public function render()
    {
        //dd(User::paginate(10));

        return view('livewire.game.admin.user.u-list', [
            'users' => User::paginate(10),
        ]);
    }

}
