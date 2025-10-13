<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SNS; 
use App\Models\Identifier; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SNS>
 */
class SNSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post' => fake()->realText(250),
            'username' => fake()->userName(),
            'identifier_id' => Identifier::inRandomOrder()->first()->id,
        ];
    }
}