<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resolution>
 */
class ResolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $date = fake()->date();

        return [
            'slug' => Str::slug($title . '-' . $date), // Genera el slug combinando título y fecha
            'title' => $title,
            'resolution_number' => fake()->unique()->numberBetween(1, 10000),
            'seen' => fake()->paragraph(),
            'considering' => fake()->paragraph(),
            'resolution' => fake()->paragraph(),
            'date' => $date,
            'status' => fake()->randomElement(GeneralStatusEnum::getValues()),
        ];
    }

    public function deleted(): static
    {
        return $this->state(fn (array $attributes) => [
            'deleted_at' => now(),
        ]);
    }
}
