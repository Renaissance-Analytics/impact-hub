<?php

namespace Tests\Feature\Livewire\Game\User\Me;

use App\Livewire\Game\User\Me\SignUp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SignUp::class)
            ->assertStatus(200);
    }
}
