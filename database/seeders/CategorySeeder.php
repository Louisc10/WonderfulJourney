<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Beach',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Forest',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Temple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
