<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' =>  'Cleber',
            'email' => 'cleber@gmail.com',
            'password' => Hash::make('cleber1234'),
            'matricula' => '1236',  
        ]);
        $user->email_verified_at = now();
        $user->permissao = false;
        $user->save();
    }
}
    