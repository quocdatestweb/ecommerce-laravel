<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('coupon_tables')->insert([
                'code' => $faker->unique()->lexify('?????'),
                'discount_amount' => $faker->randomFloat(2, 5, 50),
                'valid_from' => $faker->dateTimeBetween('-1 month', 'now'),
                'valid_to' => $faker->dateTimeBetween('now', '+1 year'),
                'usage_limit' => $faker->numberBetween(10, 100),
                'used_count' => $faker->numberBetween(0, 50),
                'is_active' => $faker->boolean(80),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}