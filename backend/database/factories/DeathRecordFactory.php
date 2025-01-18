<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeathRecord>
 */
class DeathRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'father_name'=>$this->faker->name('male'),
            'mother_name'=>$this->faker->name('female'),
            'grandfather_name'=>$this->faker->name('male'),
            'citizenship_id' => $this->faker->numerify('##-##-##-#####'),
            'gender'=>$this->faker->randomElement(['male','female']),
            'issued_by'=>$this->faker->name()


            //
        ];
    }
}
