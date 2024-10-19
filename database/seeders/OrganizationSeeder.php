<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            // Bidang Kepanduan
            ['id' => 1, 'organization_category_id' => 1, 'name' => 'Pramuka', 'coach' => json_encode([
                ['name' => 'Dara Waryuiyana, S.Pd', 'position' => 'Penata Tk.I / IIID'],
                ['name' => 'Hasan Nusir, S.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 2, 'organization_category_id' => 1, 'name' => 'PMR', 'coach' => json_encode([
                ['name' => 'T. Isman Surdi, S.Pd, M.Psi', 'position' => 'Pembina / IVA'],
                ['name' => 'Annina Raudhati Adha, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 3, 'organization_category_id' => 1, 'name' => 'Drumband', 'coach' => json_encode([
                ['name' => 'Nasri, S.Pd', 'position' => 'Penata / IIIC']
            ])],

            // Bidang Olahraga (O2SN)
            ['id' => 4, 'organization_category_id' => 2, 'name' => 'Basket', 'coach' => json_encode([
                ['name' => 'Reza Vahlevi, S.Pd', 'position' => 'Penata / IIIC']
            ])],
            ['id' => 5, 'organization_category_id' => 2, 'name' => 'Silat', 'coach' => json_encode([
                ['name' => 'Junaidi, S.Pd', 'position' => '-']
            ])],
            ['id' => 6, 'organization_category_id' => 2, 'name' => 'Atletik', 'coach' => json_encode([
                ['name' => 'Intan Safitri', 'position' => '-']
            ])],

            // Bidang Seni (FLS2N)
            ['id' => 7, 'organization_category_id' => 3, 'name' => 'Monolog', 'coach' => json_encode([
                ['name' => 'Maimunah, S.Pd.M.Pd', 'position' => 'Pembina Tk.I / IVB']
            ])],
            ['id' => 8, 'organization_category_id' => 3, 'name' => 'Prakarya', 'coach' => json_encode([
                ['name' => 'Dra. Lina Fajri', 'position' => 'Pembina Tk.I / IVB']
            ])],
            ['id' => 9, 'organization_category_id' => 3, 'name' => 'Puisi', 'coach' => json_encode([
                ['name' => 'Rohana, S.Pd', 'position' => 'Penata / IIIC']
            ])],
            ['id' => 10, 'organization_category_id' => 3, 'name' => 'Komik Digital', 'coach' => json_encode([
                ['name' => 'Devi Kurniawati, S.Tr.Kom', 'position' => 'IX']
            ])],
            ['id' => 11, 'organization_category_id' => 3, 'name' => 'Cipta Puisi', 'coach' => json_encode([
                ['name' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 12, 'organization_category_id' => 3, 'name' => 'Desain Poster', 'coach' => json_encode([
                ['name' => 'Roni Rinaldi', 'position' => 'Penata / IIIC']
            ])],
            ['id' => 13, 'organization_category_id' => 3, 'name' => 'Paskibraka', 'coach' => json_encode([
                ['name' => 'Safrizal, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 14, 'organization_category_id' => 3, 'name' => 'Film Pendek', 'coach' => json_encode([
                ['name' => 'Zhul Fitri, S.Kom', 'position' => 'Penata / IIIC']
            ])],
            ['id' => 15, 'organization_category_id' => 3, 'name' => 'Jurnalistik', 'coach' => json_encode([
                ['name' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 16, 'organization_category_id' => 3, 'name' => 'Seni Vocal', 'coach' => json_encode([
                ['name' => 'Ira Gusriani, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 17, 'organization_category_id' => 3, 'name' => 'Cipta Lagu', 'coach' => json_encode([
                ['name' => 'Ira Gusriani, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 18, 'organization_category_id' => 3, 'name' => 'Seni Tari', 'coach' => json_encode([
                ['name' => 'Ida Erawati, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 19, 'organization_category_id' => 3, 'name' => 'Menulis Cerpen', 'coach' => json_encode([
                ['name' => 'Mukhlis, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],

            // Bidang Olimpiade (KSN)
            ['id' => 20, 'organization_category_id' => 4, 'name' => 'Biologi', 'coach' => json_encode([
                ['name' => 'Aiza Fritiana, S.Si, M.Pd', 'position' => 'Pembina Tk.I / IVB']
            ])],
            ['id' => 21, 'organization_category_id' => 4, 'name' => 'Astronomi', 'coach' => json_encode([
                ['name' => 'Nur Arfah, S.T', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 22, 'organization_category_id' => 4, 'name' => 'Matematika', 'coach' => json_encode([
                ['name' => 'Dara Waryuiyana, S.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 23, 'organization_category_id' => 4, 'name' => 'Kimia', 'coach' => json_encode([
                ['name' => 'Azmir Djauhari, S.Si, M.Ed', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 24, 'organization_category_id' => 4, 'name' => 'Fisika', 'coach' => json_encode([
                ['name' => 'Yohana Selviana, S.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 25, 'organization_category_id' => 4, 'name' => 'Kebumian', 'coach' => json_encode([
                ['name' => 'Andika Triwidada, S.Pd', 'position' => 'Penata Tk.I / IIID']
            ])],
            ['id' => 26, 'organization_category_id' => 4, 'name' => 'Geografi', 'coach' => json_encode([
                ['name' => 'Sisca Vitaya, S.Pd', 'position' => 'Pembina / IVA']
            ])],
            ['id' => 27, 'organization_category_id' => 4, 'name' => 'Ekonomi', 'coach' => json_encode([
                ['name' => 'Ummi Kasum, S.Pd', 'position' => 'Penata Tk.I / IVC']
            ])],
            ['id' => 28, 'organization_category_id' => 4, 'name' => 'TIK', 'coach' => json_encode([
                ['name' => 'Yuverni Selvy, S.Si, M.Pd', 'position' => 'Pembina / IVA']
            ])],

            // Bidang Bahasa
            ['id' => 29, 'organization_category_id' => 5, 'name' => 'Debat/Pidato Bahasa Inggris', 'coach' => json_encode([
                ['name' => 'Haslina, S.Pd, M.Pd', 'position' => 'Pembina Tk.I / IVB']
            ])],
            ['id' => 30, 'organization_category_id' => 5, 'name' => 'Debat/Pidato Bahasa Indonesia', 'coach' => json_encode([
                ['name' => 'Maimunah, S.Pd, M.Pd', 'position' => 'Penata Tk.I / IVB']
            ])],

            // Bidang Keagamaan
            ['id' => 31, 'organization_category_id' => 6, 'name' => 'Rohis/Ketakwaan', 'coach' => json_encode([
                ['name' => 'Kasmawati, S.Pd', 'position' => 'Penata / IIIC']
            ])],
        ];

        DB::table('organizations')->insert($organizations);
    }
}
