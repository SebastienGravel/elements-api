<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementsStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elements_state = [
            [
                'name' => 'Gaz',
                'color' => '#E40000',
            ],
            [
                'name' => 'Liquide',
                'color' => '#5193FF',
            ],
            [
                'name' => 'Solide',
                'color' => '#ffffff',
            ],
            [
                'name' => 'Inconnu',
                'color' => '#666666',
            ],
        ];

        foreach ($elements_state as $es) {
            DB::table('elements_states')->insert([
                'name' => $es['name'],
                'color' => $es['color'],
            ]);
        }
    }
}
