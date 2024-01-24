<?php

namespace Tests\Feature\Livewire\Game\User;

use App\Livewire\Game\User\Me;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Me::class)
            ->assertStatus(200);
    }
}
