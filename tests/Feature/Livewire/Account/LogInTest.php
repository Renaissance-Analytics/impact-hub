<?php

namespace Tests\Feature\Livewire\Game\User\Me;

use App\Livewire\Game\User\Me\LogIn;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LogInTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(LogIn::class)
            ->assertStatus(200);
    }
}
