<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BirthRecord>
 */
class BirthRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Generates a random name
            'father_name' => $this->faker->name('male'), // Generates a male name for the father
            'mother_name' => $this->faker->name('female'), // Generates a female name for the mother
            'grandfather_name' => $this->faker->name('male'), // Generates a male name for the grandfather
            'dob' => $this->faker->date('Y-m-d', '-18 years'), // Generates a random date of birth (at least 18 years old)
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Random gender
            'issued_by' => $this->faker->name, // Generates a random company name
        ];
        
    }
}
