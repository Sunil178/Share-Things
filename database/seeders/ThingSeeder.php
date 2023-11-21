<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thing;

class ThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thing::create([
            'user_id' => 1,
            'name' => 'name-test',
            'short' => 'short-test',
            'long' => 'long-test',
        ]);
    }
}
