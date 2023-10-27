<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\BookingItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsBookingItem>
 */
class BookingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'guests' => $this->faker->numberBetween(1, 10),
            'bedrooms' => $this->faker->numberBetween(1, 10),
            'bathrooms' => $this->faker->numberBetween(1, 10),
            'storeys' => $this->faker->numberBetween(1, 10),
            'garages' => $this->faker->numberBetween(1, 10),
            'features' => $this->faker->words(3),
        ];
    }
}
