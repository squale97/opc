<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admins = [
            ['nom' => 'admin',
            'prenom' => 'admin',
            'profession' => 'informaticien',
            'adresse' => 'Ouaga2000',
            'email' => 'admin@opc.gov.bf',
            'numero' => '75223311',
            'profile' => 'admin',          
            'password' => bcrypt('P@ssWord'), 
            'region_id' => Region::where('libelle', 'Centre')->first()->uuid,
            'province_id' => Province::where('libelle', 'Kadiogo')->first()->uuid],

            ['nom' => 'PILGA',
            'prenom' => 'Larba',
            'profession' => 'DGJEP',
            'adresse' => 'Ouaga',
            'email' => 'lpilga@yahoo.fr',
            'numero' => '+226 79182739',
            'profile' => 'admin',          
            'password' => bcrypt('P@ssWord'), 
            'region_id' => Region::where('libelle', 'Centre')->first()->uuid,
            'province_id' => Province::where('libelle', 'Kadiogo')->first()->uuid],

            ['nom' => 'SAWADOGO',
            'prenom' => 'Somaïla',
            'profession' => 'DSEPj/GJEP',
            'adresse' => 'Ouaga',
            'email' => 'soumsaw2@yahoo.fr',
            'numero' => '+226 51485838',
            'profile' => 'admin',          
            'password' => bcrypt('Opc@2022'), 
            'region_id' => Region::where('libelle', 'Centre')->first()->uuid,
            'province_id' => Province::where('libelle', 'Kadiogo')->first()->uuid],

            ['nom' => 'TAPSOBA',
            'prenom' => 'Souleymane',
            'profession' => 'DSI',
            'adresse' => 'Ouagadougou',
            'email' => 'souleymane.tapsoba@jeunesse.gov.bf',
            'numero' => '+226 70720412',
            'profile' => 'admin',          
            'password' => bcrypt('P@ssOpc2022'), 
            'region_id' => Region::where('libelle', 'Centre')->first()->uuid,
            'province_id' => Province::where('libelle', 'Kadiogo')->first()->uuid],
        ];

        foreach ($admins as  $value) {
           Admin::create($value);
        }

        // $users = [
        //     array(
        //         'id' => 1,
        //         'name' => 'Default user',
        //         'email' => 'usager@opc.gov.bf',
        //         'password' => bcrypt('P@ssWord'),
        //     ),
        // ];
        // foreach ($users as $user) {
        //     User::create($user);
        // }
    }
}
