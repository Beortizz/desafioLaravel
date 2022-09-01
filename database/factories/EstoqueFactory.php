<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estoque;
use App\Models\Produto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Produto::factory()->count(3)->create();
        
       
        return [
            'Quantidade' => rand(1, 100),
            'Data'=> $this->faker->date('Y-m-d'), 
          ];
    }
}