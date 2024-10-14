<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['id' => 1, 'text' => 'Saya menjalani hidup yang aktif'],
            ['id' => 2, 'text' => 'Meditasi (merenung/menenangkan diri) sangat berguna bagi saya'],
            ['id' => 3, 'text' => 'Saya suka bekerja sama dalam tim (team player)'],
            ['id' => 4, 'text' => 'Berlaku adil itu sangat penting untuk saya'],
            ['id' => 5, 'text' => 'Berpikir secara terstruktur membantu saya untuk berhasil'],
            ['id' => 6, 'text' => 'Saya menikmati semua jenis musik'],
            ['id' => 7, 'text' => 'Saya suka mendaur ulang sampah'],
            ['id' => 8, 'text' => 'Saya selalu menulis catatan harian/jurnal'],
            ['id' => 9, 'text' => 'Saya menikmati permainan menyusun puzzle 3 dimensi (rubik cube, lego, puzzle kayu, dsb)'],
            ['id' => 10, 'text' => 'Saya menyukai kegiatan di luar ruang'],
            ['id' => 11, 'text' => 'Saya senang berdiskusi tentang makna kehidupan'],
            ['id' => 12, 'text' => 'Saya belajar banyak melalui berinteraksi dengan orang lain'],
            ['id' => 13, 'text' => 'Saya peduli kepada orang lain yang sedang mengalami kesulitan (social justice)'],
            ['id' => 14, 'text' => 'Saya cepat kesal dan frustasi dengan orang-orang yang tidak mampu mengatur dirinya dengan baik'],
            ['id' => 15, 'text' => 'Saya selalu tertarik untuk belajar memainkan alat musik'],
            ['id' => 16, 'text' => 'Saya suka memelihara binatang, mereka penting bagi saya'],
            ['id' => 17, 'text' => 'Saya sangat senang menulis'],
            ['id' => 18, 'text' => 'Saya dapat mudah mengingat semua hal dalam bentuk gambar di kepala/pemikiran saya'],
            ['id' => 19, 'text' => 'Saya suka bekerja dengan menggunakan peralatan'],
            ['id' => 20, 'text' => 'Saya senang berdiskusi tentang Kehidupan'],
            ['id' => 21, 'text' => 'Kegiatan ekstrakurikuler dan aktivitas di sanggar itu sangat menyenangkan.'],
            ['id' => 22, 'text' => 'Saya lebih mudah mempelajari sesuatu yang mempunyai kedekatan emosi dan menarik bagi saya.'],
            ['id' => 23, 'text' => 'Panduan dalam bentuk ‘step-by-step’ (langkah yang terstruktur) sangat membantu saya.'],
            ['id' => 24, 'text' => 'Saya sangat mudah menghafalkan lirik-lirik lagu'],
            ['id' => 25, 'text' => 'Naik gunung adalah aktivitas yang sangat menyenangkan'],
            ['id' => 26, 'text' => 'Saya sangat tertarik belajar bahasa asing'],
            ['id' => 27, 'text' => 'Saya selalu membayangkan banyak ide-ide dalam benak saya']
        ];

        DB::table('questions')->insert($questions);
    }
}
