<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id" => 1,
            "name" => "Pooh1",
            "email" => "pooh1@gmail.com",
            "password" => "password"
        ]);

        User::create([
            "id" => 2,
            "name" => "Pooh2",
            "email" => "pooh2@gmail.com",
            "password" => "password"
        ]);

        User::create([
            "id" => 3,
            "name" => "Pooh3",
            "email" => "pooh3@gmail.com",
            "password" => "password"
        ]);

        #Task

        Task::created([
            "user_id" => 1,
            "description" => "dog",

        ]);

        Task::created([
            "user_id" => 2,
            "description" => "dog",

        ]);

        Task::created([
            "user_id" => 3,
            "description" => "dog",
        ]);
    }
}
