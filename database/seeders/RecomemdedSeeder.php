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
            ['id' => 1, 'result_id' => 1, 'organization_id' => 3],

        ];

        DB::table('recomendeds')->insert($recomendeds);
    }
}
