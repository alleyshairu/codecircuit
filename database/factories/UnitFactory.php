<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Uc\Module\Unit\Model\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Unit>
 */
class UnitFactory extends Factory
{
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_id' => Str::orderedUuid()->toString(),
            'number' => fake()->randomNumber(),
            'title' => fake()->name(),
            'description' => fake()->sentence(),
        ];
    }
}
