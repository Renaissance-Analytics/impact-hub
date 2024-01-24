<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('L1234567!'),
            'role' => 'supmin',
            'email_verified_at' => now(),
        ]);
        \App\Models\CmsPage::factory()->create([
            'title' => 'ImpactHub',
            'slug' => 'home',
            'description' => 'Help make an impact by joining our quest',
            'author' => \App\Models\User::first()->id,
            'keywords' => 'impact, gamification, crowd funding, crowd sourcing, social impact, impact hub',
            'published' => 1,
            'published_at' => now(),

        ]);
    }
}
