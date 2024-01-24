<?php

namespace Tests\Feature\Livewire\Game\User\Quest;

use App\Livewire\Game\User\Quest\Board;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoardTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Board::class)
            ->assertStatus(200);
    }
}
