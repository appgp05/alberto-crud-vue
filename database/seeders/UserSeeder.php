<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => "a",
            'email' => "a@a",
            'password' => Hash::make('a')
        ]);
        //
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('admin');
        });

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });

        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('student');
        });
    }
}
