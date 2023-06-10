<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence(), '-'),
            'content' => implode('', fake()->paragraphs(4)),
            'is_published' => fake()->randomElement([1, 0]),
            'meta_title' => '',
            'meta_description' => ''
        ];
    }
}
