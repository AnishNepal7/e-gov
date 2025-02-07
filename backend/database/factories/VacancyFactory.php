<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->jobTitle(),
            'description'=>$this->faker->paragraph(),
            'date'=>$this->faker->date(),
            'status'=>$this->faker->randomElement([0,1])
            //
        ];
    }
}
