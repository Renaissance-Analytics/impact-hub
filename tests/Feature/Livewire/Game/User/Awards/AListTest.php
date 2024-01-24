<?php

namespace Tests\Feature\Livewire\Game\User;

use App\Livewire\Game\User\AchievementList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AchievementListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AchievementList::class)
            ->assertStatus(200);
    }
}
