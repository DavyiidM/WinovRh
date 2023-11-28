<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recruiter::create([
            'name' => 'Cintia Oliveira',
            'email' => 'cintia.oliveira@winov.com.br',
            'password' => 'recrutamento2024',

        ]);
        Recruiter::create([
            'name' => 'David Mendes',
            'email' => 'david.mendes@winov.com.br',
            'password' => 'admin2024',

        ]);
    }
}
