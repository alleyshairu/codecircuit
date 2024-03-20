<?php

namespace Database\Factories;

use Uc\Module\Language\Model\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Language>
 */
class CourseFactory extends Factory
{
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'PHP',
            'logo' => 'logo.php',
            'color' => '#eee',
            'website' => 'https://php.net',
        ];
    }
}
