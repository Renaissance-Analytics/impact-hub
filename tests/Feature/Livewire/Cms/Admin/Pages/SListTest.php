<?php

namespace Tests\Feature\Livewire\Cms\Admin\Pages;

use App\Livewire\Cms\Admin\Pages\SList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SList::class)
            ->assertStatus(200);
    }
}
