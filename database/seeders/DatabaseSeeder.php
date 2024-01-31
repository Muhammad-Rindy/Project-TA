<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Rindy',
            'email' => 'muhammadrindy2705@gmail.com',
            'roles' => 'admin',
            'status' => '1',
            'password'=> Hash::make('085264275564'),
        ]);
    }
}