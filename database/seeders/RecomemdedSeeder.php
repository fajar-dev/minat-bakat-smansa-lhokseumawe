<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecomemdedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recomendeds = [
            ['result_id' => 1, 'organization_id' => 3],
            ['result_id' => 1, 'organization_id' => 5],
            ['result_id' => 1, 'organization_id' => 6],
            ['result_id' => 1, 'organization_id' => 7],
            ['result_id' => 1, 'organization_id' => 8],
            ['result_id' => 1, 'organization_id' => 10],
            ['result_id' => 1, 'organization_id' => 12],
            ['result_id' => 1, 'organization_id' => 13],
            ['result_id' => 1, 'organization_id' => 14],
            ['result_id' => 1, 'organization_id' => 15],
            ['result_id' => 1, 'organization_id' => 18],
            ['result_id' => 2, 'organization_id' => 1],
            ['result_id' => 2, 'organization_id' => 2],
            ['result_id' => 2, 'organization_id' => 4],
            ['result_id' => 2, 'organization_id' => 31],
            ['result_id' => 3, 'organization_id' => 29],
            ['result_id' => 3, 'organization_id' => 30],
            ['result_id' => 4, 'organization_id' => 20],
            ['result_id' => 4, 'organization_id' => 21],
            ['result_id' => 4, 'organization_id' => 22],
            ['result_id' => 4, 'organization_id' => 23],
            ['result_id' => 4, 'organization_id' => 24],
            ['result_id' => 4, 'organization_id' => 25],
            ['result_id' => 4, 'organization_id' => 26],
            ['result_id' => 4, 'organization_id' => 27],
            ['result_id' => 4, 'organization_id' => 28],
            ['result_id' => 5, 'organization_id' => 7],
            ['result_id' => 5, 'organization_id' => 8],
            ['result_id' => 5, 'organization_id' => 9],
            ['result_id' => 5, 'organization_id' => 10],
            ['result_id' => 5, 'organization_id' => 11],
            ['result_id' => 5, 'organization_id' => 15],
            ['result_id' => 5, 'organization_id' => 19],
            ['result_id' => 6, 'organization_id' => 3],
            ['result_id' => 6, 'organization_id' => 9],
            ['result_id' => 6, 'organization_id' => 11],
            ['result_id' => 6, 'organization_id' => 13],
            ['result_id' => 6, 'organization_id' => 16],
            ['result_id' => 6, 'organization_id' => 17],
            ['result_id' => 6, 'organization_id' => 29],
            ['result_id' => 6, 'organization_id' => 30],
            ['result_id' => 7, 'organization_id' => 10],
            ['result_id' => 7, 'organization_id' => 12],
            ['result_id' => 7, 'organization_id' => 14],
            ['result_id' => 7, 'organization_id' => 15],
            ['result_id' => 8, 'organization_id' => 1],
            ['result_id' => 8, 'organization_id' => 2],
            ['result_id' => 9, 'organization_id' => 14],
            ['result_id' => 9, 'organization_id' => 20],
            ['result_id' => 9, 'organization_id' => 21],
            ['result_id' => 9, 'organization_id' => 22],
            ['result_id' => 9, 'organization_id' => 23],
            ['result_id' => 9, 'organization_id' => 24],
            ['result_id' => 9, 'organization_id' => 25],
            ['result_id' => 9, 'organization_id' => 26],
            ['result_id' => 9, 'organization_id' => 27],
            ['result_id' => 9, 'organization_id' => 28],
        ];

        DB::table('recomendeds')->insert($recomendeds);
    }
}
