<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chercheur>
 */
class ChercheurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'speudo' => fake()->name(),
            'specialite' => fake()->randomElement(['IA', 'ML', 'DL', 'NLP', 'CV']),
            'laboratoire' => fake()->randomElement(['LIRMM', 'LIMSI', 'LIP6']),
            'photo' => fake()->imageUrl(640, 480, 'people'),
            'biographie' => fake()->paragraph(),
            'cv' => fake()->url(),
            'google_scholar' => fake()->url(),
            'linkedin' => fake()->url(),
            'users_id' => fake()->randomNumber(1,20),
            'domaines_recherche_id' => fake()->randomNumber(1,20),

        ];
    }
}
