<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChefSection>
 */
class ElementFactory extends Factory
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
            'chef_section_id' => fake()->numberBetween(1,5),
            'section' => fake()->randomLetter(),
            'groupe_sanguin' => fake()->bloodGroup(),
        ];
    }
}
