<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sunil Thakur',
            'email' => 'sunil@gmail.com',
            'token' => '123',
        ]);
    }
}
