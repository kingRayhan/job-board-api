<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'location' => $this->faker->address(),
            'link' => $this->faker->url(),
            'company_name' => $this->faker->company(),
            'company_logo' => $this->faker->imageUrl(),
            'user_id' => User::all()->random()->id
        ];
    }
}
