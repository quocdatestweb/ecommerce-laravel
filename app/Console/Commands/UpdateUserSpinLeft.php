<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUserSpinLeft extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:update-spin-left';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the spin_left column in the users table with a random value between 1 and 5.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->spins_left = random_int(1, 5);
            $user->save();
        }

        $this->info('User spin_left values updated successfully.');

        return 0;
    }
}