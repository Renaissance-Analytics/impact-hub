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
       
        

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('L1234567!'),
            'role' => 'supmin',
            'email_verified_at' => now(),
        ]);
        
        //Create default page and content
        $page = \App\Models\CmsPage::factory()->create([
            'title' => 'ImpactHub',
            'slug' => 'home',
            'description' => 'Help make an impact by joining our quest',
            'author' => $user->id,
            'keywords' => 'impact, gamification, crowd funding, crowd sourcing, social impact, impact hub',
            'published' => 1,
            'published_at' => now(),
        ]);

        \App\Models\CmsSection::factory()->create([
            'cms_page_id' => $page->id,
            'name' => 'About ImpactHub',
            'title' => 'What is ImpactHub?',
            'content' => 'ImpactHub is an open-sourced project designed to assist startups in their crowd-sourcing and crowd-funding efforts. It can also be used as a starting point creating apps that want to use gamification to enhance user engagement. ',
            'order' => 1,
            'layout' => 'main',
            'status' => 'published',
            'image'=>'cms/fi58igZUXyvSjlcbanBgCMxVmVLU9dOUiG7cCPVU.png',
        ]);

         //Add default settings
         $settings = ['app_name' => 'ImpactHub',
            'description' => 'Gamification for social impact',
            'allow_registration' => false,
            'brand_name' => 'ImpactHub',
            'full_logo' => 'cms/settings/full_logo.png',
            'icon_logo' => 'cms/settings/icon_logo.png',
            'favicon' => 'cms/settings/favicon.png',
            'primary_color' => '#000000',
            'secondary_color' => '#000000',
            'tertiary_color' => '#000000'];
        foreach ($settings as $key => $value) {
            \App\Models\Setting::withoutEvents(function () use ($key, $value) {
                \App\Models\Setting::query()->create([
                    'key' => $key,
                    'value' => $value,
                ]);
            });
        }
    }
}
