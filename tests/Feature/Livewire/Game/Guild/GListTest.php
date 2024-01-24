<?php

namespace Tests\Feature\Livewire\Game\Guild;

use App\Livewire\Game\Guild\GList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GList::class)
            ->assertStatus(200);
    }
}
