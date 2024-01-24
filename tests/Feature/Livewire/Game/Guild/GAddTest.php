<?php

namespace Tests\Feature\Livewire\Game\Guild;

use App\Livewire\Game\Guild\GAdd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GAddTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GAdd::class)
            ->assertStatus(200);
    }
}
