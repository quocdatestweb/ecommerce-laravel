<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('draws')->insert([
            [
                'date' => '2023-05-01',
                'total_tickets' => 1000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'date' => '2023-06-01',
                'total_tickets' => 1200,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'date' => '2023-07-01',
                'total_tickets' => 1500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'date' => '2023-08-01',
                'total_tickets' => 1800,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'date' => '2023-09-01',
                'total_tickets' => 2000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
