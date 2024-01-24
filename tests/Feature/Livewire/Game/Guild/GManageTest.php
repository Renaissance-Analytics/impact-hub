<?php

namespace Tests\Feature\Livewire\Game\Guild;

use App\Livewire\Game\Guild\GManage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GManageTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GManage::class)
            ->assertStatus(200);
    }
}
