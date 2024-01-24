<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\Levels;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LevelsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Levels::class)
            ->assertStatus(200);
    }
}
