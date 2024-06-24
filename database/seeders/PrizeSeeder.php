<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prize;

class PrizeSeeder extends Seeder
{
    public function run()
    {
        $prizes = [
            ['name' => 'Giải thưởng 1', 'quantity' => 10],
            ['name' => 'Giải thưởng 2', 'quantity' => 5],
            ['name' => 'Giải thưởng 3', 'quantity' => 2],
        ];

        foreach ($prizes as $prize) {
            Prize::create($prize);
        }
    }
}
