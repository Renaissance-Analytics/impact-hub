<?php

namespace Tests\Feature\Livewire\Cms\Admin\Pages;

use App\Livewire\Cms\Admin\Pages\PEdit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PEditTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PEdit::class)
            ->assertStatus(200);
    }
}
