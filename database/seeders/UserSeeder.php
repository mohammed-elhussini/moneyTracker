<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username' => 'elhussini',
            'email' => 'shadow.giant11@gmail.com',
            'phone' => fake()->unique()->phoneNumber(),
            'avatar' => fake()->imageUrl(),
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
        ]);

        User::factory(4)->create();
    }
}
