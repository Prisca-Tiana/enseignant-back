<?php

namespace Database\Seeders;

use App\Models\Enseignant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enseignant::create([
            "matricule" => "100230456",
            "nom_enseignant" => "Dupont Dubois",
            "taux_horaire" => 4500000,
            "nb_heure" => 5,
        ]);
        Enseignant::create([
            "matricule" => "100230753",
            "nom_enseignant" => "KOTOZAFY Lexis",
            "taux_horaire" => 3200000,
            "nb_heure" => 15,
        ]);
        Enseignant::create([
            "matricule" => "100150753",
            "nom_enseignant" => "Jean Claude Vandam",
            "taux_horaire" => 5000000,
            "nb_heure" => 20,
        ]);
        Enseignant::create([
            "matricule" => "100150135",
            "nom_enseignant" => "Jean Baptiste Paul",
            "taux_horaire" => 2500000,
            "nb_heure" => 40,
        ]);
        Enseignant::create([
            "matricule" => "100150195",
            "nom_enseignant" => "Béatricve Léa",
            "taux_horaire" => 4000000,
            "nb_heure" => 30,
        ]);
    }
}
