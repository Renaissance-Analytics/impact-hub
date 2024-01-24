<?php

namespace Tests\Feature\Livewire\Game\Quest;

use App\Livewire\Game\Quest\Giver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GiverTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Giver::class)
            ->assertStatus(200);
    }
}
