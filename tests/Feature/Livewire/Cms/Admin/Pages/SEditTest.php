<?php

namespace Tests\Feature\Livewire\Cms\Admin\Pages;

use App\Livewire\Cms\Admin\Pages\SEdit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SEditTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SEdit::class)
            ->assertStatus(200);
    }
}
