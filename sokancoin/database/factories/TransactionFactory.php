<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'origin_wallet_id' => Wallet::query()->inRandomOrder()->value('id'),
            'destination_wallet_id' => Wallet::query()->inRandomOrder()->value('id'),
            'amount' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
