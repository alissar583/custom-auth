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
        User::insert([
            [
                'name' => 'alissar',
                'email' => 'alissar@gmail.com',
                'password' => Hash::make('alissar@123')
            ], [
                'name' => 'alissar1',
                'email' => 'alissar1@gmail.com',
                'password' => Hash::make('alissar@123')
            ]
        ]);
    }
}
