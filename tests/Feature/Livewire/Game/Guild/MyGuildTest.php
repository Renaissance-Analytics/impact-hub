<?php

namespace Tests\Feature\Livewire\Game\Guild;

use App\Livewire\Game\Guild\MyGuild;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MyGuildTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(MyGuild::class)
            ->assertStatus(200);
    }
}
