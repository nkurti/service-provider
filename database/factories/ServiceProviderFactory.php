<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceProvider>
 */
class ServiceProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $imageIndex = 1;
        $imagePath = "/images/Service_Image_{$imageIndex}.webp";
    
        $imageIndex = $imageIndex >= 5 ? 1 : $imageIndex + 1;
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'logo' => $imagePath,
            'category_id' => Category::factory(), // creates a new Category unless overridden
        ];
    }
}
