<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\Redirect::factory()->create([
             'short_code' => '1q2w3',
             'url' => 'http://google.com/?q=url+shortener+test',
         ]);
    }
}
