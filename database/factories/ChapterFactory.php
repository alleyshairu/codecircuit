<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Uc\Module\Course\Model\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Chapter>
 */
class ChapterFactory extends Factory
{
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter_id' => Str::orderedUuid()->toString(),
            'number' => fake()->randomNumber(),
            'title' => fake()->name(),
            'description' => fake()->sentence(),
        ];
    }
}
