<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        \App\Models\User::factory(5000)->make()->each(function ($user) use(&$count){
            $user->email = "medico_" .($count++) . "@test.com";
            $user->hospital_id = 2;
            $user->save();
        });
    }
}
