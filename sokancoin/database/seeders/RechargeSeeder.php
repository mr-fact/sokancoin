<?php

namespace Database\Seeders;

use App\Models\Recharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RechargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recharge::factory()->count(count: 10)->create();
    }
}
