<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $results = [
            ['id' => 1, 'type' => 'KINESTETIK', 'content' => 'Kemampuan yang berkaitan dengan gerak tubuh untuk menunjukkan gagasan ataupun perasaan, meliputi kemampuan yang digunakan oleh atlet, penari, atau pendaki. Individu dengan kemampuan ini cenderung mudah memahami dan melakukan gerakan dengan tepat hanya dengan latihan yang relatif singkat.', 'development_area' => 'Olah gerak, seni rupa, seni musik'],
            ['id' => 2, 'type' => 'INTERPERSONAL', 'content' => 'Kemampuan untuk membaca, memahami, dan peka terhadap apa yang diperlihatkan orang lain secara verbal maupun nonverbal, mampu membaca perasaan, watak, serta temperamen orang lain. Individu dengan kemampuan ini cenderung mudah dalam bergaul serta bekerja sama dengan orang lain. terhadap flora, fauna, dan lingkungannya.', 'development_area' => 'Diskusi kelompok, olahraga kelompok, organisasi'],
            ['id' => 3, 'type' => 'EKSISTENSIAL', 'content' => 'Kemampuan untuk menjawab persoalan-persoalan terkait eksistensi manusia serta memahami makna kehidupan. Individu dengan kecerdasan ini tipe pemikir, dapat melihat hal-hal yang terjadi sehari-hari dan mempertanyakan mengapa terjadi seperti itu atau apa yang menjadi penyebabnya. Umumnya individu ini berpikir secara filosofis atau religius. Kecerdasan ini sering disebut juga kecerdasan spiritual atau moral.', 'development_area' => 'Merawat hewan, diskusi buku, belajar Bahasa asing, berinteraksi dengan alam'],
            ['id' => 4, 'type' => 'LOGIS-MATEMATIS', 'content' => 'Kemampuan untuk melakukan perhitungan, pola, serta pemikiran logis dan ilmiah. Pada kemampuan ini termasuk melihat hubungan antara suatu hal dengan hal lain sehingga individu dengan kemampuan ini cenderung mudah dalam mengklasifikasikan serta melihat inti permasalahan.', 'development_area' => 'Merancang program komputer sederhana, bermain dengan angka, problem-solving project'],
            ['id' => 5, 'type' => 'INTRA PERSONAL', 'content' => 'Kemampuan yang berkaitan dengan pengetahuan akan diri sendiri dan kemampuan untuk bertindak secara adaptif (cepat menyesuaikan diri). Individu dengan kemampuan ini cenderung mudah dalam mengambil keputusan serta memahami tujuan hidup. Individu dengan kecerdasan intrapersonal menggunakan pemahaman akan pemikiran, perasaan dan emosinya untuk memahami apa yang terjadi disekitarnya. Umumnya dikenal sebagai orang yang ‘cerdas diri’ (self-smart), cenderung pemalu,  serta tidak mudah membaur dengan orang lain.', 'development_area' => 'Membuat proyek menulis dan eksplorasi topik-topik spesifik'],
            ['id' => 6, 'type' => 'MUSIKAL', 'content' => 'Kemampuan untuk mengolah atau memanfaatkan sesuatu yang berkaitan dengan irama, nada, dan suara termasuk suara-suara yang bersumber dari alam. Individu yang memiliki kecerdasan musikal adalah orang yang sensitif terhadap bunyi, dapat mendengarkan bunyi-bunyian sebagai irama yang umumnya orang lain tidak mampu menangkapnya. Biasanya mereka dapat dengan mudah mempelajari atau memainkan alat musik serta menulis komposisi lagu. Meskipun pengetahuan terkait melodi, ritme, dan timbre merupakan suatu hal yang penting. Namun, Gardner menekankan aspek afeksi dan rasa (feeling) merupakan inti dari kecerdasan musikal.. ', 'development_area' => 'Musik dan Menyanyi'],
            ['id' => 7, 'type' => 'VERBAL/LINGUISTIK', 'content' => 'Kemampuan untuk menggunakan dan mengolah kata secara efektif. Pada kemampuan ini termasuk menyimak menulis, membaca, serta berbicara. Komponen inti pada kemampuan ini yaitu kepekaan individu terhadap bunyi, struktur, makna, fungsi kata dan kalimat, serta bahasa. Individu dengan kecerdasan linguistik yang tinggi, sangat baik dalam kemampuannya untuk menuangkan perasaan dan pemikirannya dalam kata-kata yang mudah dipahami serta mampu meyakinkan orang lain. Umumnya mereka suka membaca, menulis atau berpidato (public speaking).', 'development_area' => 'Membaca, menulis dan review buku – bermain dengan kata-kata'],
            ['id' => 8, 'type' => 'NATURALISTIK', 'content' => 'Kemampuan untuk berinteraksi dan sensitif terhadap alam, mampu memahami lingkungan alam dengan baik, dapat membedakan pola-pola yang terjadi di alam. Orang dengan kecerdasan ini sangat menyukai kegiatan di luar ruangan, bekerja, dan mengeksplorasi lingkungan. Contohnya, individu yang memiliki ketertarikan terhadap flora, fauna, dan lingkungannya.', 'development_area' => 'Kegiatan luar ruangan, berhubungan dengan alam'],
            ['id' => 9, 'type' => 'SPASIAL VISUAL', 'content' => 'Kemampuan untuk membayangkan, mempertahankan, dan mengubah bentuk mental visual dari sebuah gambar. Misalnya, membayangkan atau menebak bagaimana bentuk sebuah benda bila diputar atau dibalik. Individu dengan kecerdasan visual spasial memiliki imajinasi yang tidak terbatas, artistik, dan kreatif. Pada umumnya mereka mendapat julukan sebagai ‘si cerdas gambar’ (picture smart) karena mampu menerjemahkan sesuatu dalam pemahaman ruang dan gambar.', 'development_area' => 'Kegiatan yang berhubungan dengan ruang dan struktur 3D'],
        ];

        DB::table('results')->insert($results);
    }
}
