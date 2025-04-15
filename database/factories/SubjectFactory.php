<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'close_relative' => fake()->name(),
            'close_relative_degree' => fake()->randomElement(['mother', 'father', 'relative', 'friend']),
            'birthdate' => fake()->date(),
            'cpf' => fake()->numerify("###.###.###-##"),
            'rg' => fake()->numerify("##.###.###-#"),
            'birthplace' => fake()->city(),
            'address' => fake()->address(),
            'religion' => fake()->randomElement(['católica', 'protestante', 'outra']),
            'color' => fake()->randomElement(['preto', 'pardo', 'indigeno', 'branco', 'amarelo']),
            'income' => fake()->randomElement(['zero', '2900', '7100', '22000', 'superior']),
            'chemical_dependency' => fake()->randomElement(['álcool', 'cigarro']),
            'crime_article' => fake()->randomElement(['123', '456', '789']),
            'crime_status' => fake()->randomElement(['aguardando julgamento', 'condenado']),
            'family_telephone' => fake()->phoneNumber(),
            'family_address' => fake()->address(),
        ];
    }
}
