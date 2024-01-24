<?php

namespace Tests\Feature\Livewire\Game\Admin;

use App\Livewire\Game\Admin\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Settings::class)
            ->assertStatus(200);
    }
}
