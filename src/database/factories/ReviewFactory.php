<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\User;
use App\Models\Store;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'store_id' => Store::inRandomOrder()->first()->id,
            'evaluation' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText(10),
        ];
    }
}
