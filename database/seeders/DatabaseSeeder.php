<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory()->count(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'falatozz',
            'email' => 'api@falatozz.hu',
            'email_verified_at' => now(),
            'password' => Hash::make('falatozz'),
        ]);
    }
}
