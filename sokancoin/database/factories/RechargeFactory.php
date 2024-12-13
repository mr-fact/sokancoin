<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recharge>
 */
class RechargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wallet' => Wallet::query()->inRandomOrder()->value('id'),
            'amount' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
