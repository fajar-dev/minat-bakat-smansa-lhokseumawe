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
            ['name' => 'Bidang Kepanduan'],
            ['name' => 'Bidang Olahraga (O2SN)'],
            ['name' => 'Bidang Seni (FLS2N)'],
            ['name' => 'Bidang Olimpiade (KSN)'],
            ['name' => 'Bidang Bahasa'],
            ['name' => 'Bidang Keagamaan'],
        ];

        DB::table('organization_categories')->insert($categories);
    }
}
