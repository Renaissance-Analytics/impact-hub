<?php

namespace Tests\Feature\Livewire\Cms\Sections;

use App\Livewire\Cms\Sections\Choice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ChoiceTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Choice::class)
            ->assertStatus(200);
    }
}
