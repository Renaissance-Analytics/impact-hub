<?php

namespace Tests\Feature\Livewire\Account;

use App\Livewire\Account\MyAccount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MyAccountTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(MyAccount::class)
            ->assertStatus(200);
    }
}
