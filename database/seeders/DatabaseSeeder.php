<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Produtos::factory(1)->create();
        \App\Models\Estoque::factory(1)->create();
        \App\Models\EstoqueProdutos::factory(1)->create();
        // $this->call(EstoqueSeeder::class);
        
    }
}