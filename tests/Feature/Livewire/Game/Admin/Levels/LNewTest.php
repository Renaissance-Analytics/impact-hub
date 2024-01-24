<?php

namespace Tests\Feature\Livewire\Game\Admin\Levels;

use App\Livewire\Game\Admin\Levels\LNew;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LNewTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(LNew::class)
            ->assertStatus(200);
    }
}
