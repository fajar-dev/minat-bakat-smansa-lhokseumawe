<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Bidang Kepanduan'],
            ['id' => 2, 'name' => 'Bidang Olahraga (O2SN)'],
            ['id' => 3, 'name' => 'Bidang Seni (FLS2N)'],
            ['id' => 4, 'name' => 'Bidang Olimpiade (KSN)'],
            ['id' => 5, 'name' => 'Bidang Bahasa'],
            ['id' => 6, 'name' => 'Bidang Keagamaan'],
        ];

        DB::table('organization_categories')->insert($categories);
    }
}
