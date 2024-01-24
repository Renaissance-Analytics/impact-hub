<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LevelTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Level::class)
            ->assertStatus(200);
    }
}
