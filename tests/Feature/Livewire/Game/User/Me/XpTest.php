<?php

namespace Tests\Feature\Livewire\Game\User;

use App\Livewire\Game\User\Xp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class XpTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Xp::class)
            ->assertStatus(200);
    }
}
