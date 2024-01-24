<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\Achievements;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AchievementsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Achievements::class)
            ->assertStatus(200);
    }
}
