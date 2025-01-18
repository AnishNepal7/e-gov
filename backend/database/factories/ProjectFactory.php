<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'title'=>$this->faker->word(),
            'description'=>$this->faker->paragraph(),
            'date' => $this->faker->dateTimeBetween( 
                Carbon::now()->startOfYear(), // Start of current month
                Carbon::now()->endOfYear() // End of current month
                )->format('Y-m-d'),
            'phase'=>$this->faker->randomElement([0,1]),
            'status'=>$this->faker->randomElement([0,1])
            //
        ];
    }
}
