<?php

namespace Tests\Feature\Livewire\Cms\Sections;

use App\Livewire\Cms\Sections\Hero;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HeroTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Hero::class)
            ->assertStatus(200);
    }
}
