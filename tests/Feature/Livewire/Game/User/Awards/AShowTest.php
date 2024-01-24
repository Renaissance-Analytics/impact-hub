<?php

namespace Tests\Feature\Livewire\Game\User;

use App\Livewire\Game\User\AchievementShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AchievementShowTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AchievementShow::class)
            ->assertStatus(200);
    }
}
