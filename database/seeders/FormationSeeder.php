<?php

namespace Database\Seeders;

use App\Models\Diplome;
use App\Models\Formation;
use App\Models\Niveau;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formations= ['Aucun', 'Enseignements général et technique','Formation professionnelle'];
        foreach ($formations as $key => $formation) {
            Formation::create([
                'libelle' => $formation,
            ]);
        }

        $niveaux =[
            ['libelle'=>'Aucun'        , 'formation_id'=>Formation::where('libelle','Aucun')->first()->uuid],
            ['libelle'=>'Aucun'        , 'formation_id'=>Formation::where('libelle', 'Enseignements général et technique')->first()->uuid],
             ['libelle'=>'Primaire'    , 'formation_id'=>Formation::where('libelle', 'Enseignements général et technique')->first()->uuid], 
             ['libelle'=>'Post-primaire'    , 'formation_id'=>Formation::where('libelle', 'Enseignements général et technique')->first()->uuid], 
             ['libelle'=>'Secondaire'  , 'formation_id'=>Formation::where('libelle', 'Enseignements général et technique')->first()->uuid],
             ['libelle'=>'Supérieur'   , 'formation_id'=>Formation::where('libelle', 'Enseignements général et technique')->first()->uuid],
             ['libelle'=>'CQB'         , 'formation_id'=>Formation::where('libelle', 'Formation professionnelle')->first()->uuid],
             ['libelle'=>'CQP'         , 'formation_id'=>Formation::where('libelle', 'Formation professionnelle')->first()->uuid],
             ['libelle'=>'BQP'         , 'formation_id'=>Formation::where('libelle', 'Formation professionnelle')->first()->uuid], 
             ['libelle'=>'BPT'         , 'formation_id'=>Formation::where('libelle', 'Formation professionnelle')->first()->uuid],
             ['libelle'=>'BPTS'        , 'formation_id'=>Formation::where('libelle', 'Formation professionnelle')->first()->uuid]
            ];
        foreach ($niveaux as $key => $niveau) {
            Niveau::create([
                'libelle' => $niveau['libelle'],
                'formation_id' => $niveau['formation_id'],
            ]);
        }

        $diplomes =[
            ['libelle'=>'CEPE'        , 'niveau_id'=>Niveau::where('libelle', 'Primaire')->first()->uuid],
             ['libelle'=>'BEPC'    , 'niveau_id'=>Niveau::where('libelle', 'post-primaire')->first()->uuid], 
             ['libelle'=>'CAP'  , 'niveau_id'=>Niveau::where('libelle', 'post-primaire')->first()->uuid],
             ['libelle'=>'BEP'   , 'niveau_id'=>Niveau::where('libelle', 'Secondaire')->first()->uuid],
             ['libelle'=>'BAC'         , 'niveau_id'=>Niveau::where('libelle', 'Secondaire')->first()->uuid],
             ['libelle'=>'DEUG '         , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
             ['libelle'=>'Licence'         , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid], 
             ['libelle'=>'Maitrise '         , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
             ['libelle'=>'Master '        , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
             ['libelle'=>'DESS'        , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
             ['libelle'=>'DEA'        , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
             ['libelle'=>'Doctorat'        , 'niveau_id'=>Niveau::where('libelle', 'Supérieur')->first()->uuid],
            ];
        foreach ($diplomes as $key => $diplome) {
            Diplome::create([
                'libelle' => $diplome['libelle'],
                'niveau_id' => $diplome['niveau_id'],
            ]);
        }
    }
}
