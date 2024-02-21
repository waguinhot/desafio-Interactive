<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $data = Carbon::now();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'example@email.com',
            'password' => Hash::make('secret'),
            "created_at" => $data->subYears(5)
        ]);

         \App\Models\User::factory(500)->create();
    }
}
