<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
             'nome' => $this->faker->word(),
             'sabor' => $this->faker->word(),
             'preco' => rand(1, 10),
             'descricao' => $this->faker->word(),
             'path' => $this->faker->image(public_path('storage/produtos'), 500, 500),
        ];
    }
}