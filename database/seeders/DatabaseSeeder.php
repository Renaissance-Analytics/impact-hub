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
            'email' => 'demo@demo.com',
            'password' => bcrypt('password'),
            'role' => 'supmin',
            'email_verified_at' => now(),
        ]);
        
        //Create default page and content
        $page = \App\Models\CmsPage::factory()->create([
            'title' => 'ImpactHub',
            'slug' => 'impact-hub',
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
         $settings2set = [
            [
                'setting_group' => 'app',
                'key' => 'app_name',
                'value' => 'ImpactHub',
                'type' => 'string|max:25',
                'tooltip' => 'The name of the application.'
            ],
            [
                'setting_group' => 'app',
                'key' => 'description',
                'value' => 'Gamification for social impact',
                'type' => 'string|max:160',
                'tooltip' => 'A short description of the application.'
            ],
            [
                'setting_group' => 'app',
                'key' => 'allow_registration',
                'value' => false, // false as a string since the value column is a string type
                'type' => 'boolean',
                'tooltip' => 'Whether to allow new user registrations.'
            ],
            [
                'setting_group' => 'app',
                'key' => 'home_page',
                'value' => $page->id, // false as a string since the value column is a string type
                'type' => 'select|obj|cms_page:id:title',
                'tooltip' => 'The page to use as the home page.'
            ],
            
            [
                'setting_group' => 'branding',
                'key' => 'brand_name',
                'value' => 'ImpactHub',
                'type' => 'string|max:255',
                'tooltip' => 'The brand name of the application.'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'full_logo',
                'value' => 'cms/settings/full_logo.png',
                'type' => 'image|max:2048|dimensions:max_width=200,max_height=100|extensions:png,jpg,jpeg',
                'tooltip' => 'Upload the full logo image(Max: 200x100|png,jpg,jpeg).'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'icon_logo',
                'value' => 'cms/settings/icon_logo.png',
                'type' => 'image|max:2048|dimensions:max_width=100,max_height=100|extensions:png,jpg,jpeg',
                'tooltip' => 'Upload the site icon(Max: 100x100|png,jpg,jpeg).'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'favicon',
                'value' => 'cms/settings/favicon.ico',
                'type' => 'file|max:100|extensions:gif,ico',
                'tooltip' => 'Upload the site Favicon(Max: 32x32|gif,ico).'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'show_icon',
                'value' => false, // false as a string since the value column is a string type
                'type' => 'boolean',
                'tooltip' => 'Whether to show the site icon in the header.'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'brand_display',
                'value' => 'full_logo', // true as a string since the value column is a string type
                'type' => 'select|opt|full_logo:Full Logo,brand_name:Brand Name',
                'tooltip' => 'Whether to use the full logo or the icon logo.'
            ],
            [
                'setting_group' => 'branding',
                'key' => 'metaimg',
                'value' => 'cms/fi58igZUXyvSjlcbanBgCMxVmVLU9dOUiG7cCPVU.png',
                'type' => 'image|max:2048|dimensions:max_width=2400,max_height=100|extensions:png,jpg,jpeg',
                'tooltip' => 'Upload the default OG Meta image(Max Width: 2400|png,jpg,jpeg).'
            ],
            
            [
                'setting_group' => 'theme',
                'key' => 'primary_color',
                'value' => '#000000',
                'type' => 'hex_color',
                'tooltip' => 'The primary color of the theme.'
            ],
            [
                'setting_group' => 'theme',
                'key' => 'secondary_color',
                'value' => '#000000',
                'type' => 'hex_color',
                'tooltip' => 'The secondary color of the theme.'
            ],
            [
                'setting_group' => 'theme',
                'key' => 'tertiary_color',
                'value' => '#000000',
                'type' => 'hex_color',
                'tooltip' => 'The tertiary color of the theme.'
            ]
        ];
        foreach ($settings2set as $setting) {
            \App\Models\Setting::create([
                'setting_group' => $setting['setting_group'],
                'key' => $setting['key'],
                'value' => $setting['value'],
                'type' => $setting['type'],
                'tooltip' => $setting['tooltip'],
            ]);
        }
    }
}
