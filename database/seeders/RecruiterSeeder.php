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
            'name' => 'Sergio Danilo Jr.',
            'email' => 'sergiodanilojr@email.com',
            'password' => 'password',

        ]);
    }
}
