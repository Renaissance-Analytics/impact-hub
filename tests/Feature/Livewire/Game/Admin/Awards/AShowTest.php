<?php

namespace Tests\Feature\Livewire\Game\Admin\Awards;

use App\Livewire\Game\Admin\Awards\AShow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AShowTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AShow::class)
            ->assertStatus(200);
    }
}
