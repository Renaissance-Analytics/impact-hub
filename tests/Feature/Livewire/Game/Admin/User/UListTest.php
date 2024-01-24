<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\UserList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserList::class)
            ->assertStatus(200);
    }
}
