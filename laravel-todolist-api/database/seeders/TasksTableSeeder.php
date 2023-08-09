<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tasks;

use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $user->tasks()->saveMany(
                Tasks::factory()
                    ->count(10)
                    ->make()
            );
        });
    }
}
