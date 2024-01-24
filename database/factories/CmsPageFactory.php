<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CmsPage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CmsPage>
 */
class CmsPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CmsPage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'keywords' => $this->faker->word,
            'author' => null,
            'slug' => $this->faker->slug,
            'published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTime,
        ];
    }
}
