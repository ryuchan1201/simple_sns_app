<?php

namespace Database\Factories;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Tweet::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'text' => $this->faker->sentence(20),
        ];
    }
}
