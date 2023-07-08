<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementsFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            1- Actinides
            2- Alcalins
            3- Alcalino-terreux
            4- Gaz nobles
            5- Halogènes
            6- Lanthanides
            7- Métalloïdes
            8- Métaux de transition
            9- Métaux pauvres
            10- Non-métaux
            11- Non classés
        */

        $elements_family = [
            [
                'name' => 'Actinides',
                'slug' => 'actinides',
                'color' => '#B34D8F',
            ],
            [
                'name' => 'Alcalins',
                'slug' => 'alcalins',
                'color' => '#F0671F',
            ],
            [
                'name' => 'Alcalino-terreux',
                'slug' => 'alcalino-terreux',
                'color' => '#FDB52D',
            ],
            [
                'name' => 'Gaz nobles',
                'slug' => 'gaz-nobles',
                'color' => '#0065A7',
            ],
            [
                'name' => 'Halogènes',
                'slug' => 'halogenes',
                'color' => '#00A0DE',
            ],
            [
                'name' => 'Lanthanides',
                'slug' => 'lanthanides',
                'color' => '#C7152B',
            ],
            [
                'name' => 'Métalloïdes',
                'slug' => 'metalloides',
                'color' => '#7BC13D',
            ],
            [
                'name' => 'Métaux de transition',
                'slug' => 'metaux-de-transition',
                'color' => '#693C97',
            ],
            [
                'name' => 'Métaux pauvres',
                'slug' => 'metaux-pauvres',
                'color' => '#006535',
            ],
            [
                'name' => 'Non-métaux',
                'slug' => 'non-metaux',
                'color' => '#929397',
            ],
            [
                'name' => 'Non classés',
                'slug' => 'non-classes',
                'color' => '#dddddd',
            ],
        ];

        foreach ($elements_family as $ef) {
            DB::table('elements_families')->insert([
                'name' => $ef['name'],
                'slug' => $ef['slug'],
                'color' => $ef['color'],
            ]);
        }
    }
}
