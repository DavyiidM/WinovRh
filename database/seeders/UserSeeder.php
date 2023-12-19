<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Cintia Oliveira',
            'email' => 'cintia.oliveira@winov.com.br',
            'password' => 'recrutamento2024',

        ]);
        User::create([
            'name' => 'David Mendes',
            'email' => 'david.mendes@winov.com.br',
            'password' => 'admin2024',

        ]);
    }
}
