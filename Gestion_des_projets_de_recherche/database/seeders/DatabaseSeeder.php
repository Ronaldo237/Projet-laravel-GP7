<?php

namespace Database\Seeders;

use App\Models\Chercheur;
use App\Models\DomaineRecherche;
use App\Models\Publication;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Publication::factory(20)->create();

        //DomaineRecherche::factory(20)->create();
    }
}
