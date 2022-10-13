<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        \App\Models\Hospital::factory(5000)->make()->each(function ($user) use(&$count){
            $user->user = "apiuser" .($count++);
            $user->save();
        });
    }
}
