<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\XDash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class XDashTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(XDash::class)
            ->assertStatus(200);
    }
}
