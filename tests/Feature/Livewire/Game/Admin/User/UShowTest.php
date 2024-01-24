<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\UserShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserShowTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserShow::class)
            ->assertStatus(200);
    }
}
