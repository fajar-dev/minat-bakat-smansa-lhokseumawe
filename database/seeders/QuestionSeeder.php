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
            ['id' => 1, 'category' => 'intelligence', 'text' => 'Saya menjalani hidup yang aktif'],
            ['id' => 2, 'category' => 'intelligence', 'text' => 'Meditasi (merenung/menenangkan diri) sangat berguna bagi saya'],
            ['id' => 3, 'category' => 'intelligence', 'text' => 'Saya suka bekerja sama dalam tim (team player)'],
            ['id' => 4, 'category' => 'intelligence', 'text' => 'Berlaku adil itu sangat penting untuk saya'],
            ['id' => 5, 'category' => 'intelligence', 'text' => 'Berpikir secara terstruktur membantu saya untuk berhasil'],
            ['id' => 6, 'category' => 'intelligence', 'text' => 'Saya menikmati semua jenis musik'],
            ['id' => 7, 'category' => 'intelligence', 'text' => 'Saya suka mendaur ulang sampah'],
            ['id' => 8, 'category' => 'intelligence', 'text' => 'Saya selalu menulis catatan harian/jurnal'],
            ['id' => 9, 'category' => 'intelligence', 'text' => 'Saya menikmati permainan menyusun puzzle 3 dimensi (rubik cube, lego, puzzle kayu, dsb)'],
            ['id' => 10, 'category' => 'intelligence', 'text' => 'Saya menyukai kegiatan di luar ruang'],
            ['id' => 11, 'category' => 'intelligence', 'text' => 'Saya senang berdiskusi tentang makna kehidupan'],
            ['id' => 12, 'category' => 'intelligence', 'text' => 'Saya belajar banyak melalui berinteraksi dengan orang lain'],
            ['id' => 13, 'category' => 'intelligence', 'text' => 'Saya peduli kepada orang lain yang sedang mengalami kesulitan (social justice)'],
            ['id' => 14, 'category' => 'intelligence', 'text' => 'Saya cepat kesal dan frustasi dengan orang-orang yang tidak mampu mengatur dirinya dengan baik'],
            ['id' => 15, 'category' => 'intelligence', 'text' => 'Saya selalu tertarik untuk belajar memainkan alat musik'],
            ['id' => 16, 'category' => 'intelligence', 'text' => 'Saya suka memelihara binatang, mereka penting bagi saya'],
            ['id' => 17, 'category' => 'intelligence', 'text' => 'Saya sangat senang menulis'],
            ['id' => 18, 'category' => 'intelligence', 'text' => 'Saya dapat mudah mengingat semua hal dalam bentuk gambar di kepala/pemikiran saya'],
            ['id' => 19, 'category' => 'intelligence', 'text' => 'Saya suka bekerja dengan menggunakan peralatan'],
            ['id' => 20, 'category' => 'intelligence', 'text' => 'Saya senang berdiskusi tentang Kehidupan'],
            ['id' => 21, 'category' => 'intelligence', 'text' => 'Kegiatan ekstrakurikuler dan aktivitas di sanggar itu sangat menyenangkan.'],
            ['id' => 22, 'category' => 'intelligence', 'text' => 'Saya lebih mudah mempelajari sesuatu yang mempunyai kedekatan emosi dan menarik bagi saya.'],
            ['id' => 23, 'category' => 'intelligence', 'text' => 'Panduan dalam bentuk ‘step-by-step’ (langkah yang terstruktur) sangat membantu saya.'],
            ['id' => 24, 'category' => 'intelligence', 'text' => 'Saya sangat mudah menghafalkan lirik-lirik lagu'],
            ['id' => 25, 'category' => 'intelligence', 'text' => 'Naik gunung adalah aktivitas yang sangat menyenangkan'],
            ['id' => 26, 'category' => 'intelligence', 'text' => 'Saya sangat tertarik belajar bahasa asing'],
            ['id' => 27, 'category' => 'intelligence', 'text' => 'Saya selalu membayangkan banyak ide-ide dalam benak saya'],

            // Bagian I
            // R
            ['id' => 28, 'category' => 'personality', 'text' => 'Memperbaiki alat-alat listrik (seterika, dll)'],
            ['id' => 29, 'category' => 'personality', 'text' => 'Memperbaiki Mobil'],
            ['id' => 30, 'category' => 'personality', 'text' => 'Memperbaiki alat-alat mekanik (sepeda, dll)'],
            ['id' => 31, 'category' => 'personality', 'text' => 'Membuat benda dari kayu'],
            ['id' => 32, 'category' => 'personality', 'text' => 'Berternak ayam, bebek, atau angsa'],
            ['id' => 33, 'category' => 'personality', 'text' => 'Menggunakan perkakas bengkel dan mesin-mesin'],
            ['id' => 34, 'category' => 'personality', 'text' => 'Membudidayakan tanaman hias'],
            ['id' => 35, 'category' => 'personality', 'text' => 'Mengikuti kursus menggambar keteknikan'],
            ['id' => 36, 'category' => 'personality', 'text' => 'Mengikuti kursus kerajinan kayu'],
            ['id' => 37, 'category' => 'personality', 'text' => 'Mengikuti kursus montir mobil'],

            // I
            ['id' => 38, 'category' => 'personality', 'text' => 'Membaca buku atau majalah ilmiah'],
            ['id' => 39, 'category' => 'personality', 'text' => 'Bekerja di laboratorium'],
            ['id' => 40, 'category' => 'personality', 'text' => 'Mengerjakan suatu proyek ilmiah'],
            ['id' => 41, 'category' => 'personality', 'text' => 'Mempelajari suatu teori ilmiah'],
            ['id' => 42, 'category' => 'personality', 'text' => 'Melakukan percobaan kimia'],
            ['id' => 43, 'category' => 'personality', 'text' => 'Membaca mengenai topik-topik khusus atas keinginan sendiri'],
            ['id' => 44, 'category' => 'personality', 'text' => 'Menerapkan matematika dalam masalah praktis'],
            ['id' => 45, 'category' => 'personality', 'text' => 'Mengambil kursus pelajaran fisika'],
            ['id' => 46, 'category' => 'personality', 'text' => 'Mengambil kursus pelajaran matematika'],
            ['id' => 47, 'category' => 'personality', 'text' => 'Mengambil kursus pelajaran biologi'],

            // A
            ['id' => 48, 'category' => 'personality', 'text' => 'Membuat sketsa, menggambar atau melukis'],
            ['id' => 49, 'category' => 'personality', 'text' => 'Menjadi pemain dalam komedi atau sandiwara'],
            ['id' => 50, 'category' => 'personality', 'text' => 'Merancang perabotan, pakaian atau poster'],
            ['id' => 51, 'category' => 'personality', 'text' => 'Bermain dalam suatu band, kelompok atau orkestra'],
            ['id' => 52, 'category' => 'personality', 'text' => 'Memainkan alat musik'],
            ['id' => 53, 'category' => 'personality', 'text' => 'Menulis untuk suatu majalah atau koran'],
            ['id' => 54, 'category' => 'personality', 'text' => 'Membuat lukisan atau foto orang'],
            ['id' => 55, 'category' => 'personality', 'text' => 'Menulis novel atau sandiwara'],
            ['id' => 56, 'category' => 'personality', 'text' => 'Membaca atau menulis puisi'],
            ['id' => 57, 'category' => 'personality', 'text' => 'Mengikuti kursus kesenian'],
            ['id' => 58, 'category' => 'personality', 'text' => 'Menata atau menggubah musik'],

            // S
            ['id' => 59, 'category' => 'personality', 'text' => 'Bertemu dengan pengamat masalah sosial atau pendidikan'],
            ['id' => 60, 'category' => 'personality', 'text' => 'Membaca artikel atau buku mengenai masalah sosial'],
            ['id' => 61, 'category' => 'personality', 'text' => 'Bekerja untuk Palang Merah'],
            ['id' => 62, 'category' => 'personality', 'text' => 'Membantu orang lain dengan masalah pribadinya'],
            ['id' => 63, 'category' => 'personality', 'text' => 'Menjaga/mengurus dan mengawasi anak-anak'],
            ['id' => 64, 'category' => 'personality', 'text' => 'Mempelajari kenakalan remaja'],
            ['id' => 65, 'category' => 'personality', 'text' => 'Mengajar di perguruan tinggi'],
            ['id' => 66, 'category' => 'personality', 'text' => 'Membaca buku-buku psikologi (pergaulan, dll)'],
            ['id' => 67, 'category' => 'personality', 'text' => 'Membantu orang-orang berkebutuhan khusus'],
            ['id' => 68, 'category' => 'personality', 'text' => 'Mengambil kursus hubungan masyarakat'],
            ['id' => 69, 'category' => 'personality', 'text' => 'Mengajar di sekolah lanjutan (SMP, SMA)'],

            // E
            ['id' => 70, 'category' => 'personality', 'text' => 'Mempengaruhi orang lain'],
            ['id' => 71, 'category' => 'personality', 'text' => 'Menjual suatu produk'],
            ['id' => 72, 'category' => 'personality', 'text' => 'Mempelajari strategi untuk keberhasilan bisnis'],
            ['id' => 73, 'category' => 'personality', 'text' => 'Berwirausaha'],
            ['id' => 74, 'category' => 'personality', 'text' => 'Mengikuti ceramah mengenai penjualan'],
            ['id' => 75, 'category' => 'personality', 'text' => 'Mengambil kursus singkat administrasi dan kepemimpinan'],
            ['id' => 76, 'category' => 'personality', 'text' => 'Menjadi pemimpin dalam kelompok'],
            ['id' => 77, 'category' => 'personality', 'text' => 'Mengawasi pekerjaan orang lain'],
            ['id' => 78, 'category' => 'personality', 'text' => 'Bertemu dengan tokoh eksekutif dan pemimpin'],
            ['id' => 79, 'category' => 'personality', 'text' => 'Memimpin kelompok dalam meraih tujuan tertentu'],
            ['id' => 80, 'category' => 'personality', 'text' => 'Menjadi penanggung jawab dalam kampanye politik'],

            // C
            ['id' => 81, 'category' => 'personality', 'text' => 'Mengisi formulir/daftar isian yang panjang'],
            ['id' => 82, 'category' => 'personality', 'text' => 'Mengetik sendiri makalah atau surat-surat'],
            ['id' => 83, 'category' => 'personality', 'text' => 'Melakukan operasi matematika dalam bisnis atau pembukuan'],
            ['id' => 84, 'category' => 'personality', 'text' => 'Mengoperasikan berbagai jenis alat kantor'],
            ['id' => 85, 'category' => 'personality', 'text' => 'Membuat catatan pengeluaran yang terperinci'],
            ['id' => 86, 'category' => 'personality', 'text' => 'Menyusun sistem pengarsipan (filling)'],
            ['id' => 87, 'category' => 'personality', 'text' => 'Mengikuti kursus bisnis'],
            ['id' => 88, 'category' => 'personality', 'text' => 'Mengikuti kursus pembukuan (akuntansi)'],
            ['id' => 89, 'category' => 'personality', 'text' => 'Mengikuti kursus hitung dagang'],
            ['id' => 90, 'category' => 'personality', 'text' => 'Mengoperasikan komputer'],
            ['id' => 91, 'category' => 'personality', 'text' => 'Membuat daftar inventaris dari persediaan atau produk'],

            // Bagian II
            // R
            ['id' => 92, 'category' => 'personality', 'text' => 'Saya dapat menggunakan peralatan mesin untuk pertukangan kayu (gergaji kayu listrik, mesin bubut dll)'],
            ['id' => 93, 'category' => 'personality', 'text' => 'Saya dapat membuat gambar dengan skala'],
            ['id' => 94, 'category' => 'personality', 'text' => 'Saya dapat mengganti minyak mesin mobil atau ban mobil'],
            ['id' => 95, 'category' => 'personality', 'text' => 'Saya dapat menggunakan peralatan mesin, misal bor listrik atau mesin jahit'],
            ['id' => 96, 'category' => 'personality', 'text' => 'Saya dapat menghaluskan dan memplitur perabotan atau barang-barang dari kayu'],
            ['id' => 97, 'category' => 'personality', 'text' => 'Saya dapat membaca cetak biru (blue print)'],
            ['id' => 98, 'category' => 'personality', 'text' => 'Saya dapat melakukan perbaikan kecil pada alat listrik'],
            ['id' => 99, 'category' => 'personality', 'text' => 'Saya dapat memperbaiki perabotan'],
            ['id' => 100, 'category' => 'personality', 'text' => 'Saya dapat melakukan perbaikan kecil pada TV dan radio'],
            ['id' => 101, 'category' => 'personality', 'text' => 'Saya dapat melakukan perbaikan kecil pada pipa air, keran dll'],

            // I
            ['id' => 102, 'category' => 'personality', 'text' => 'Saya dapat menggunakan prinsip aljabar untuk memecahkan masalah matematika'],
            ['id' => 103, 'category' => 'personality', 'text' => 'Saya dapat melakukan percobaan atau penelitian ilmiah'],
            ['id' => 104, 'category' => 'personality', 'text' => 'Saya mengerti tentang “waktu paruh” elemen radioaktif'],
            ['id' => 105, 'category' => 'personality', 'text' => 'Saya dapat menggunakan tabel logaritma'],
            ['id' => 106, 'category' => 'personality', 'text' => 'Saya dapat menggunakan kalkulator atau mistar hitung'],
            ['id' => 107, 'category' => 'personality', 'text' => 'Saya dapat menggunakan mikroskop'],
            ['id' => 108, 'category' => 'personality', 'text' => 'Saya dapat memprogram komputer untuk mempelajari masalah ilmiah'],
            ['id' => 109, 'category' => 'personality', 'text' => 'Saya dapat menjelaskan fungsi sel darah putih'],
            ['id' => 110, 'category' => 'personality', 'text' => 'Saya dapat menginterpretasikan rumus kimia sederhana'],
            ['id' => 111, 'category' => 'personality', 'text' => 'Saya dapat mengerti mengapa satelit buatan manusia tidak jatuh ke bumi'],
            ['id' => 112, 'category' => 'personality', 'text' => 'Saya dapat menyebutkan tiga makanan yang memiliki protein tinggi'],

            // A
            ['id' => 113, 'category' => 'personality', 'text' => 'Saya dapat memainkan alat musik'],
            ['id' => 114, 'category' => 'personality', 'text' => 'Saya dapat menyanyikan suara dua atau suara empat dalam paduan suara'],
            ['id' => 115, 'category' => 'personality', 'text' => 'Saya dapat menyajikan permainan musik tunggal'],
            ['id' => 116, 'category' => 'personality', 'text' => 'Saya dapat bermain dalam sandiwara'],
            ['id' => 117, 'category' => 'personality', 'text' => 'Saya dapat menginterpretasikan cerita atau bahan bacaan'],
            ['id' => 118, 'category' => 'personality', 'text' => 'Saya dapat membuat sketsa orang sehingga ia dapat dikenal'],
            ['id' => 119, 'category' => 'personality', 'text' => 'Saya dapat melukis atau membuat patung'],
            ['id' => 120, 'category' => 'personality', 'text' => 'Saya dapat menata atau menggubah musik'],
            ['id' => 121, 'category' => 'personality', 'text' => 'Saya dapat merancang pakaian, poster atau perabotan'],
            ['id' => 122, 'category' => 'personality', 'text' => 'Saya dapat menulis cerita atau puisi'],

            // S
            ['id' => 123, 'category' => 'personality', 'text' => 'Saya pandai dalam menolong orang lain yang sedang bingung atau bermasalah'],
            ['id' => 124, 'category' => 'personality', 'text' => 'Saya mudah berbicara dengan semua orang'],
            ['id' => 125, 'category' => 'personality', 'text' => 'Saya dapat memimpin diskusi kelompok'],
            ['id' => 126, 'category' => 'personality', 'text' => 'Saya dapat merencanakan acara hiburan untuk pesta dalam lingkungan terbatas (keluarga, teman, dll)'],
            ['id' => 127, 'category' => 'personality', 'text' => 'Saya mampu/kompeten dalam menghibur dan menemani orang yang lebih tua dari saya'],
            ['id' => 128, 'category' => 'personality', 'text' => 'Saya pandai dalam menjelaskan sesuatu kepada orang lain'],
            ['id' => 129, 'category' => 'personality', 'text' => 'Saya telah berpartisipasi dalam pencarian dana/amal'],
            ['id' => 130, 'category' => 'personality', 'text' => 'Saya dapat bekerja sebagai pengurus RT/RW'],
            ['id' => 131, 'category' => 'personality', 'text' => 'Saya dapat mengajar anak-anak dengan mudah'],
            ['id' => 132, 'category' => 'personality', 'text' => 'Saya dapat mengajar orang dewasa dengan mudah'],
            ['id' => 133, 'category' => 'personality', 'text' => 'Orang mencari saya untuk menceritakan masalah mereka'],

            // E
            ['id' => 134, 'category' => 'personality', 'text' => 'Saya memenangkan penghargaan sebagai tenaga penjual atau pemimpin'],
            ['id' => 135, 'category' => 'personality', 'text' => 'Saya tahu bagaimana menjadi pemimpin yang berhasil/sukses'],
            ['id' => 136, 'category' => 'personality', 'text' => 'Saya seorang pembicara di depan umum yang baik'],
            ['id' => 137, 'category' => 'personality', 'text' => 'Saya dapat mengelola usaha kecil'],
            ['id' => 138, 'category' => 'personality', 'text' => 'Saya dapat mengelola kampanye penjualan'],
            ['id' => 139, 'category' => 'personality', 'text' => 'Saya dapat mengatur pekerjaan orang lain'],
            ['id' => 140, 'category' => 'personality', 'text' => 'Saya dapat membuat kelompok sosial atau kelompok kerja berjalan dengan baik'],
            ['id' => 141, 'category' => 'personality', 'text' => 'Saya dikenal dapat berbicara dengan orang yang sulit/keras kepala'],
            ['id' => 142, 'category' => 'personality', 'text' => 'Saya seorang tenaga penjual yang baik'],
            ['id' => 143, 'category' => 'personality', 'text' => 'Saya pandai mempengaruhi orang lain untuk melakukan sesuatu menurut cara saya'],
            ['id' => 144, 'category' => 'personality', 'text' => 'Saya seorang yang berambisi dan cenderung berbicara apa adanya (tidak secara agresif)'],

            // C
            ['id' => 145, 'category' => 'personality', 'text' => 'Saya dapat mengetik sepuluh jari dengan cepat'],
            ['id' => 146, 'category' => 'personality', 'text' => 'Saya dapat menggunakan alat pemroses data yang sederhana seperti komputer'],
            ['id' => 147, 'category' => 'personality', 'text' => 'Saya dapat menjalankan mesin Duplikator/mesin penjumlah'],
            ['id' => 148, 'category' => 'personality', 'text' => 'Saya dapat menulis steno'],
            ['id' => 149, 'category' => 'personality', 'text' => 'Saya dapat mengarsip surat dan berkas-berkas lain'],
            ['id' => 150, 'category' => 'personality', 'text' => 'Saya dapat melakukan pekerjaan administrasi kantor'],
            ['id' => 151, 'category' => 'personality', 'text' => 'Saya dapat menggunakan program pembukuan'],
            ['id' => 152, 'category' => 'personality', 'text' => 'Saya dapat melakukan tugas administrasi dalam waktu singkat'],
            ['id' => 153, 'category' => 'personality', 'text' => 'Saya dapat menggunakan mesin penghitung (kalkulator)'],
            ['id' => 154, 'category' => 'personality', 'text' => 'Saya dapat menempatkan kredit dan debit'],
            ['id' => 155, 'category' => 'personality', 'text' => 'Saya dapat mencatat dengan cermat pembayaran/penjualan'],

            // bagian III
            // R
            ['id' => 156, 'category' => 'personality', 'text' => 'Mekanik pesawat terbang'],
            ['id' => 157, 'category' => 'personality', 'text' => 'Penanggung jawab keamanan'],
            ['id' => 158, 'category' => 'personality', 'text' => 'Mekanik/montir mobil'],
            ['id' => 159, 'category' => 'personality', 'text' => 'Pengerajin kayu'],
            ['id' => 160, 'category' => 'personality', 'text' => 'Spesialis perikanan dan margasatwa'],
            ['id' => 161, 'category' => 'personality', 'text' => 'Ahli tanaman'],
            ['id' => 162, 'category' => 'personality', 'text' => 'Operator alat-alat berat'],
            ['id' => 163, 'category' => 'personality', 'text' => 'Peninjau kelayakan (surveyor)'],
            ['id' => 164, 'category' => 'personality', 'text' => 'Pengawas konstruksi bangunan'],
            ['id' => 165, 'category' => 'personality', 'text' => 'Pengemudi bis'],
            ['id' => 166, 'category' => 'personality', 'text' => 'Insinyur otomotif'],
            ['id' => 167, 'category' => 'personality', 'text' => 'Ahli mesin'],
            ['id' => 168, 'category' => 'personality', 'text' => 'Ahli listrik'],

            // I
            ['id' => 169, 'category' => 'personality', 'text' => 'Ahli meteorologi (ilmu cuaca)'],
            ['id' => 170, 'category' => 'personality', 'text' => 'Ahli biologi'],
            ['id' => 171, 'category' => 'personality', 'text' => 'Ahli astronomi (ilmu bintang)'],
            ['id' => 172, 'category' => 'personality', 'text' => 'Teknisi laboratorium medis'],
            ['id' => 173, 'category' => 'personality', 'text' => 'Ahli antropologi'],
            ['id' => 174, 'category' => 'personality', 'text' => 'Ahli ilmu hewan'],
            ['id' => 175, 'category' => 'personality', 'text' => 'Ahli kimia'],
            ['id' => 176, 'category' => 'personality', 'text' => 'Ilmuan peneliti'],
            ['id' => 177, 'category' => 'personality', 'text' => 'Penulis artikel ilmiah'],
            ['id' => 178, 'category' => 'personality', 'text' => 'Penyunting artikel ilmiah'],
            ['id' => 179, 'category' => 'personality', 'text' => 'Ahli geologi'],
            ['id' => 180, 'category' => 'personality', 'text' => 'Ahli botani (ilmu tumbuhan)'],
            ['id' => 181, 'category' => 'personality', 'text' => 'Pekerjaan riset ilmiah'],
            ['id' => 182, 'category' => 'personality', 'text' => 'Ahli fisika'],

            // A
            ['id' => 183, 'category' => 'personality', 'text' => 'Penulis puisi'],
            ['id' => 184, 'category' => 'personality', 'text' => 'Dirigen simfoni'],
            ['id' => 185, 'category' => 'personality', 'text' => 'Pemain musik'],
            ['id' => 186, 'category' => 'personality', 'text' => 'Penulis novel'],
            ['id' => 187, 'category' => 'personality', 'text' => 'Aktor/Aktris'],
            ['id' => 188, 'category' => 'personality', 'text' => 'Penulis lepas'],
            ['id' => 189, 'category' => 'personality', 'text' => 'Penata musik'],
            ['id' => 190, 'category' => 'personality', 'text' => 'Wartawan'],
            ['id' => 191, 'category' => 'personality', 'text' => 'Seniman'],
            ['id' => 192, 'category' => 'personality', 'text' => 'Penanyi'],
            ['id' => 193, 'category' => 'personality', 'text' => 'Penggubah musik'],
            ['id' => 194, 'category' => 'personality', 'text' => 'Pemahat patung'],
            ['id' => 195, 'category' => 'personality', 'text' => 'Penulis sandiwara'],
            ['id' => 196, 'category' => 'personality', 'text' => 'Kartunis'],

            // S
            ['id' => 197, 'category' => 'personality', 'text' => 'Sosiolog'],
            ['id' => 198, 'category' => 'personality', 'text' => 'Guru sekolah lanjutan'],
            ['id' => 199, 'category' => 'personality', 'text' => 'Pakar kenakalan remaja'],
            ['id' => 200, 'category' => 'personality', 'text' => 'Terapi bicara'],
            ['id' => 201, 'category' => 'personality', 'text' => 'Konselor pernikahan'],
            ['id' => 202, 'category' => 'personality', 'text' => 'Kepala sekolah'],
            ['id' => 203, 'category' => 'personality', 'text' => 'Fisioterapis'],
            ['id' => 204, 'category' => 'personality', 'text' => 'Psikolog Klinis'],
            ['id' => 205, 'category' => 'personality', 'text' => 'Guru ilmu sosial'],
            ['id' => 206, 'category' => 'personality', 'text' => 'Direktur lembaga masyarakat'],
            ['id' => 207, 'category' => 'personality', 'text' => 'Konselor masalah pribadi'],
            ['id' => 208, 'category' => 'personality', 'text' => 'Pekerja sosial'],
            ['id' => 209, 'category' => 'personality', 'text' => 'Konselor kejuruan dan pekerjaan'],

            // E
            ['id' => 210, 'category' => 'personality', 'text' => 'Spekulator bisnis'],
            ['id' => 211, 'category' => 'personality', 'text' => 'Eksekutif pembelian'],
            ['id' => 212, 'category' => 'personality', 'text' => 'Eksekutif periklanan'],
            ['id' => 213, 'category' => 'personality', 'text' => 'Wakil perusahaan produksi'],
            ['id' => 214, 'category' => 'personality', 'text' => 'Penjualan asuransi jiwa'],
            ['id' => 215, 'category' => 'personality', 'text' => 'Penyiar radio-TV'],
            ['id' => 216, 'category' => 'personality', 'text' => 'Eksekutif bisnis'],
            ['id' => 217, 'category' => 'personality', 'text' => 'Manajer restoran'],
            ['id' => 218, 'category' => 'personality', 'text' => 'Pembaca acara (MC)'],
            ['id' => 219, 'category' => 'personality', 'text' => 'Eksekutif penjualan'],
            ['id' => 220, 'category' => 'personality', 'text' => 'Eksekutif penjualan real estate'],
            ['id' => 221, 'category' => 'personality', 'text' => 'Pemandu wisata'],
            ['id' => 222, 'category' => 'personality', 'text' => 'Manajer toko serba ada'],
            ['id' => 223, 'category' => 'personality', 'text' => 'Manajer penjualan'],

            // C
            ['id' => 224, 'category' => 'personality', 'text' => 'Ahli pembukuan'],
            ['id' => 225, 'category' => 'personality', 'text' => 'Guru bisnis / ilmu dagang'],
            ['id' => 226, 'category' => 'personality', 'text' => 'Pemeriksaan anggaran'],
            ['id' => 227, 'category' => 'personality', 'text' => 'Akuntan publik bersertifikat'],
            ['id' => 228, 'category' => 'personality', 'text' => 'Penyelidik kredit'],
            ['id' => 229, 'category' => 'personality', 'text' => 'Pencatat steno di pengadilan'],
            ['id' => 230, 'category' => 'personality', 'text' => 'Kasir bank'],
            ['id' => 231, 'category' => 'personality', 'text' => 'Ahli pajak'],
            ['id' => 232, 'category' => 'personality', 'text' => 'Pengawas barang inventaris'],
            ['id' => 233, 'category' => 'personality', 'text' => 'Operator alat listrik kantor'],
            ['id' => 234, 'category' => 'personality', 'text' => 'Analisis keuangan'],
            ['id' => 235, 'category' => 'personality', 'text' => 'Penaksir biaya'],
            ['id' => 236, 'category' => 'personality', 'text' => 'Pembayar gaji'],
            ['id' => 237, 'category' => 'personality', 'text' => 'Pemeriksa di bank']
        ];

        DB::table('questions')->insert($questions);
    }
}
