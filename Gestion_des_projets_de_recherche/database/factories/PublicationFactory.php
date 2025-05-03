<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publication>
 */
class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chercheurs_id' => fake()->numberBetween(1, 20),
            'titre' => $this->faker->sentence,
            'resume' => $this->faker->paragraph,
            'lien' => $this->faker->url,
            'domaines_recherche_id' => fake()->numberBetween(1, 20),
            'fichier_pdf' => $this->faker->url,
        ];
    }
}
