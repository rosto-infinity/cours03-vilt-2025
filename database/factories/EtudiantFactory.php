<?php

namespace Database\Factories;

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
            'name' => $this->faker->name(),
            'prenom' => $this->faker->firstName(),
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'age' => $this->faker->numberBetween(6, 18),
            'niveau_scolaire_id' => $this->faker->numberBetween(1, 4)

        ];
    }
}
