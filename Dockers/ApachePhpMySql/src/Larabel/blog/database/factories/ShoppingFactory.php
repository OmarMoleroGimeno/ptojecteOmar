<?php

use App\Models\Shopping;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingFactory extends Factory
{
    protected $model = Shopping::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'date' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}