<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\GameHome;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GameHomeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GameHome::class)
            ->assertStatus(200);
    }
}
