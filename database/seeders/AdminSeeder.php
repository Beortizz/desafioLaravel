<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
  
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' =>  'Bernardo',
            'email' => 'beortizz@gmail.com',
            'password' => Hash::make('bernardo1234'),
            'matricula' => '1234',  
        ]);
        $user->email_verified_at = now();
        $user->permissao = true;
        $user->save();
    }
}