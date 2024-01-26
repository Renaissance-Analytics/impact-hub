<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CmsSection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CmsSection>
 */
class CmsSectionFactory extends Factory
{

    protected $model = CmsSection::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'layout' => null,
            'order' => null,
            'cms_page_id' => null,
            'status' => null,
            'bgcolor' => null,
            'image' => null,
            'title' => $this->faker->sentence,
            'cta_link' => null,
            'cta_text' => null,
            'content' => null,
            'page_one_id' => null,
            'page_one_blurb' => null,
            'page_one_image' => null,
            'page_one_color' => null,
            'page_one_cta_icon' => null,
            'page_one_cta_text' => null,
            'page_two_id' => null,
            'page_two_blurb' => null,
            'page_two_image' => null,
            'page_two_color' => null,
            'page_two_cta_icon' => null,
            'page_two_cta_text' => null,
        ];
    }
}
