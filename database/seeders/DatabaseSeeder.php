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
        $this->call([
            UserSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
        ]);
        // \App\Models\Category::factory(5)->create();
        \App\Models\Article::factory(50)->create();
    }
}
