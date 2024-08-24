<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChefSection>
 */
class ChefSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>fake()->firstName(),
            'prenom'=> fake()->lastName(),
            'date_naissance' => fake()->date(),
            'matricule' =>fake()->creditCardNumber(),
            'section' => fake()->randomLetter(),
            'groupe_sanguin' => fake()->bloodGroup(),
            
            
        ];
    }
}
