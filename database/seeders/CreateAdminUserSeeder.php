<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Nour Zahed KH',
            'email' => 'nzahedkh@gmail.com',
            'password' => bcrypt('Nour@963kh'),
            ]);
    }
}
