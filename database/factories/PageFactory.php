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
        $title = fake()->sentence();
        $status = fake()->randomElement(['draft', 'published', 'review']);
        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'content' => implode('', fake()->paragraphs(4)),
            'status' => $status,
            'published_at' => $status === 'published' ? now()->format('Y-m-d H:i:s'):null,
            'meta_title' => '',
            'meta_description' => ''
        ];
    }
}
