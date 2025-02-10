<?php

namespace Database\Factories;

use App\Models\NiveauScolaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->firstName(),
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'age' => $this->faker->numberBetween(10, 28),
            'niveau_scolaire_id' =>  rand(1,4)
        ];
    }
}