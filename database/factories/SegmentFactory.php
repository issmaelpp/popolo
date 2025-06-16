<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Segment>
 */
class SegmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'traffic_line_id' => TrafficLine::pluck('id')->random(),
            'surface_type' => $this->faker->randomElement(SurfaceTypeEnum::getValues()),
            'orientation' => $this->faker->randomElement(OrientationEnum::getValues()),
            'coordinate' => json_encode([
                [
                    'latitude' => $this->faker->latitude,
                    'longitude' => $this->faker->longitude,
                ],
                [
                    'latitude' => $this->faker->latitude,
                    'longitude' => $this->faker->longitude,
                ],
            ]),
        ];
    }

    public function deleted(): static
    {
        return $this->state(fn (array $attributes) => [
            'deleted_at' => now(),
        ]);
    }
}
