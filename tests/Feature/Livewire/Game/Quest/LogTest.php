<?php

namespace Tests\Feature\Livewire\Game\User\Quest;

use App\Livewire\Game\User\Quest\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LogTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Log::class)
            ->assertStatus(200);
    }
}
