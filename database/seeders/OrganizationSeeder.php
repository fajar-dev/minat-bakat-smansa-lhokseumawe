<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            // Bidang Kepanduan
            ['organization_category_id' => 1, 'name' => 'Pramuka', 'coach' => 'Dara Waryuiyana, S.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 1, 'name' => 'Pramuka', 'coach' => 'Hasan Nusir, S.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 1, 'name' => 'PMR', 'coach' => 'T. Isman Surdi, S.Pd, M.Psi', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 1, 'name' => 'PMR', 'coach' => 'Annina Raudhati Adha, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 1, 'name' => 'Drumband', 'coach' => 'Nasri, S.Pd', 'position' => 'Penata / IIIC'],

            // Bidang Olahraga (O2SN)
            ['organization_category_id' => 2, 'name' => 'Basket', 'coach' => 'Reza Vahlevi, S.Pd', 'position' => 'Penata / IIIC'],
            ['organization_category_id' => 2, 'name' => 'Silat', 'coach' => 'Junaidi, S.Pd', 'position' => '-'],
            ['organization_category_id' => 2, 'name' => 'Atletik', 'coach' => 'Intan Safitri', 'position' => '-'],

            // Bidang Seni (FLS2N)
            ['organization_category_id' => 3, 'name' => 'Monolog', 'coach' => 'Maimunah, S.Pd.M.Pd', 'position' => 'Pembina Tk.I / IVB'],
            ['organization_category_id' => 3, 'name' => 'Prakarya', 'coach' => 'Dra. Lina Fajri', 'position' => 'Pembina Tk.I / IVB'],
            ['organization_category_id' => 3, 'name' => 'Puisi', 'coach' => 'Rohana, S.Pd', 'position' => 'Penata / IIIC'],
            ['organization_category_id' => 3, 'name' => 'Komik Digital', 'coach' => 'Devi Kurniawati, S.Tr.Kom', 'position' => 'IX'],
            ['organization_category_id' => 3, 'name' => 'Cipta Puisi', 'coach' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 3, 'name' => 'Desain Poster', 'coach' => 'Roni Rinaldi', 'position' => 'Penata / IIIC'],
            ['organization_category_id' => 3, 'name' => 'Paskibraka', 'coach' => 'Safrizal, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 3, 'name' => 'Film Pendek', 'coach' => 'Zhul Fitri, S.Kom', 'position' => 'Penata / IIIC'],
            ['organization_category_id' => 3, 'name' => 'Jurnalistik', 'coach' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 3, 'name' => 'Seni Vocal', 'coach' => 'Ira Gusriani, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 3, 'name' => 'Cipta Lagu', 'coach' => 'Ira Gusriani, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 3, 'name' => 'Seni Tari', 'coach' => 'Ida Erawati, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 3, 'name' => 'Menulis Cerpen', 'coach' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID'],

            // Bidang Olimpiade (KSN)
            ['organization_category_id' => 4, 'name' => 'Biologi', 'coach' => 'Aiza Fritiana, S.Si, M.Pd', 'position' => 'Pembina Tk.I / IVB'],
            ['organization_category_id' => 4, 'name' => 'Astronomi', 'coach' => 'Nur Arfah, S.T', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 4, 'name' => 'Matematika', 'coach' => 'Dara Waryuiyana, S.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 4, 'name' => 'Kimia', 'coach' => 'Azmir Djauhari, S.Si, M.Ed', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 4, 'name' => 'Fisika', 'coach' => 'Yohana Selviana, S.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 4, 'name' => 'Kebumian', 'coach' => 'Andika Triwidada, S.Pd', 'position' => 'Penata Tk.I / IIID'],
            ['organization_category_id' => 4, 'name' => 'Geografi', 'coach' => 'Sisca Vitaya, S.Pd', 'position' => 'Pembina / IVA'],
            ['organization_category_id' => 4, 'name' => 'Ekonomi', 'coach' => 'Ummi Kasum, S.Pd', 'position' => 'Penata Tk.I / IVC'],
            ['organization_category_id' => 4, 'name' => 'TIK', 'coach' => 'Yuverni Selvy, S.Si, M.Pd', 'position' => 'Pembina / IVA'],

            // Bidang Bahasa
            ['organization_category_id' => 5, 'name' => 'Debat/Pidato Bahasa Inggris', 'coach' => 'Haslina, S.Pd, M.Pd', 'position' => 'Pembina Tk.I / IVB'],
            ['organization_category_id' => 5, 'name' => 'Debat/Pidato Bahasa Indonesia', 'coach' => 'Maimunah, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IVB'],

            // Bidang Keagamaan
            ['organization_category_id' => 6, 'name' => 'Rohis/Ketakwaan', 'coach' => 'Kasmawati, S.Pd', 'position' => 'Penata / IIIC'],
        ];

        DB::table('organizations')->insert($organizations);
    }
}
