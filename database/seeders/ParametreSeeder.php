<?php

namespace Database\Seeders;

use App\Models\Parametre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parametre::create([
            'montant_payement' => 1500,
            'compte_marchand' => '77406101',
            'username' => 'username',
            'password' => 'password',
            'ministere' => 'Ministère des Sports, de l\'Autonomisation des Jeunes et de l\'Emploi',
            'direction' => 'DIRECTION GENERALE DE LA JEUNESSE ET DE L’EDUCATION PERMANENTE',
        ]);
    }
}
