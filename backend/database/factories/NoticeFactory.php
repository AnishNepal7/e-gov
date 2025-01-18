<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
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
                Carbon::now()->startOfMonth(), // Start of current month
                Carbon::now()->endOfMonth() // End of current month
                )->format('Y-m-d'),
            'status'=>$this->faker->randomElement([0,1])
            //
        ];
    }
}
