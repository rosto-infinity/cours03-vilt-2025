<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NiveauScolaire;

class NiveauScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NiveauScolaire::create(["nom"=> "6ième"]);
        NiveauScolaire::create(["nom"=> "5ième"]);
        NiveauScolaire::create(["nom"=> "4ième"]);
        NiveauScolaire::create(["nom"=> "3ième"]);
    }
}
