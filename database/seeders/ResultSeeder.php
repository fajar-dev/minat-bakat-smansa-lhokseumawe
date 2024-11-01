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
            ['id' => 1, 'category' => 'intelligence', 'type' => 'KINESTETIK', 'content' => 'Kemampuan yang berkaitan dengan gerak tubuh untuk menunjukkan gagasan ataupun perasaan, meliputi kemampuan yang digunakan oleh atlet, penari, atau pendaki. Individu dengan kemampuan ini cenderung mudah memahami dan melakukan gerakan dengan tepat hanya dengan latihan yang relatif singkat.', 'development_area' => 'Olah gerak, seni rupa, seni musik'],
            ['id' => 2, 'category' => 'intelligence', 'type' => 'INTERPERSONAL', 'content' => 'Kemampuan untuk membaca, memahami, dan peka terhadap apa yang diperlihatkan orang lain secara verbal maupun nonverbal, mampu membaca perasaan, watak, serta temperamen orang lain. Individu dengan kemampuan ini cenderung mudah dalam bergaul serta bekerja sama dengan orang lain. terhadap flora, fauna, dan lingkungannya.', 'development_area' => 'Diskusi kelompok, olahraga kelompok, organisasi'],
            ['id' => 3, 'category' => 'intelligence', 'type' => 'EKSISTENSIAL', 'content' => 'Kemampuan untuk menjawab persoalan-persoalan terkait eksistensi manusia serta memahami makna kehidupan. Individu dengan kecerdasan ini tipe pemikir, dapat melihat hal-hal yang terjadi sehari-hari dan mempertanyakan mengapa terjadi seperti itu atau apa yang menjadi penyebabnya. Umumnya individu ini berpikir secara filosofis atau religius. Kecerdasan ini sering disebut juga kecerdasan spiritual atau moral.', 'development_area' => 'Merawat hewan, diskusi buku, belajar Bahasa asing, berinteraksi dengan alam'],
            ['id' => 4, 'category' => 'intelligence', 'type' => 'LOGIS-MATEMATIS', 'content' => 'Kemampuan untuk melakukan perhitungan, pola, serta pemikiran logis dan ilmiah. Pada kemampuan ini termasuk melihat hubungan antara suatu hal dengan hal lain sehingga individu dengan kemampuan ini cenderung mudah dalam mengklasifikasikan serta melihat inti permasalahan.', 'development_area' => 'Merancang program komputer sederhana, bermain dengan angka, problem-solving project'],
            ['id' => 5, 'category' => 'intelligence', 'type' => 'INTRA PERSONAL', 'content' => 'Kemampuan yang berkaitan dengan pengetahuan akan diri sendiri dan kemampuan untuk bertindak secara adaptif (cepat menyesuaikan diri). Individu dengan kemampuan ini cenderung mudah dalam mengambil keputusan serta memahami tujuan hidup. Individu dengan kecerdasan intrapersonal menggunakan pemahaman akan pemikiran, perasaan dan emosinya untuk memahami apa yang terjadi disekitarnya. Umumnya dikenal sebagai orang yang ‘cerdas diri’ (self-smart), cenderung pemalu,  serta tidak mudah membaur dengan orang lain.', 'development_area' => 'Membuat proyek menulis dan eksplorasi topik-topik spesifik'],
            ['id' => 6, 'category' => 'intelligence', 'type' => 'MUSIKAL', 'content' => 'Kemampuan untuk mengolah atau memanfaatkan sesuatu yang berkaitan dengan irama, nada, dan suara termasuk suara-suara yang bersumber dari alam. Individu yang memiliki kecerdasan musikal adalah orang yang sensitif terhadap bunyi, dapat mendengarkan bunyi-bunyian sebagai irama yang umumnya orang lain tidak mampu menangkapnya. Biasanya mereka dapat dengan mudah mempelajari atau memainkan alat musik serta menulis komposisi lagu. Meskipun pengetahuan terkait melodi, ritme, dan timbre merupakan suatu hal yang penting. Namun, Gardner menekankan aspek afeksi dan rasa (feeling) merupakan inti dari kecerdasan musikal.. ', 'development_area' => 'Musik dan Menyanyi'],
            ['id' => 7, 'category' => 'intelligence', 'type' => 'VERBAL/LINGUISTIK', 'content' => 'Kemampuan untuk menggunakan dan mengolah kata secara efektif. Pada kemampuan ini termasuk menyimak menulis, membaca, serta berbicara. Komponen inti pada kemampuan ini yaitu kepekaan individu terhadap bunyi, struktur, makna, fungsi kata dan kalimat, serta bahasa. Individu dengan kecerdasan linguistik yang tinggi, sangat baik dalam kemampuannya untuk menuangkan perasaan dan pemikirannya dalam kata-kata yang mudah dipahami serta mampu meyakinkan orang lain. Umumnya mereka suka membaca, menulis atau berpidato (public speaking).', 'development_area' => 'Membaca, menulis dan review buku – bermain dengan kata-kata'],
            ['id' => 8, 'category' => 'intelligence', 'type' => 'NATURALISTIK', 'content' => 'Kemampuan untuk berinteraksi dan sensitif terhadap alam, mampu memahami lingkungan alam dengan baik, dapat membedakan pola-pola yang terjadi di alam. Orang dengan kecerdasan ini sangat menyukai kegiatan di luar ruangan, bekerja, dan mengeksplorasi lingkungan. Contohnya, individu yang memiliki ketertarikan terhadap flora, fauna, dan lingkungannya.', 'development_area' => 'Kegiatan luar ruangan, berhubungan dengan alam'],
            ['id' => 9, 'category' => 'intelligence', 'type' => 'SPASIAL VISUAL', 'content' => 'Kemampuan untuk membayangkan, mempertahankan, dan mengubah bentuk mental visual dari sebuah gambar. Misalnya, membayangkan atau menebak bagaimana bentuk sebuah benda bila diputar atau dibalik. Individu dengan kecerdasan visual spasial memiliki imajinasi yang tidak terbatas, artistik, dan kreatif. Pada umumnya mereka mendapat julukan sebagai ‘si cerdas gambar’ (picture smart) karena mampu menerjemahkan sesuatu dalam pemahaman ruang dan gambar.', 'development_area' => 'Kegiatan yang berhubungan dengan ruang dan struktur 3D'],
            [
                'id' => 10,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'REALISTIK',
                'content' => '<ol>
                    <li>Tipe realistis adalah orang yang mudah mempelajari dan senang bekerja dengan alat-alat atau mesin dan juga suka dengan hewan. Pada umumnya mereka menghindari aktivitas sosial seperti mengajar atau menyampaikan informasi kepada orang lain.</li>
                    <li>Karakter personal ini sangat senang bila dalam beraktivitas dapat melihat langsung dan menyentuh apapun yang dikerjakan dan digunakan: tanaman, hewan, peralatan, mesin ataupun perkakas lainnya.</li>
                    <li>Melihat dirinya sebagai orang yang praktis, mekanis serta realistis dalam menghadapi sesuatu.</li>
                    <li>Karakter personal individu dengan tipe ini cenderung jujur, praktis, fokus, mekanis, bertekad, dan menyukai pekerjaan kasar. Aktivitas yang diminati berkaitan dengan kegiatan mekanik, fisik, dan atletik.</li>
                    <li>Contoh karier yang dapat menjadi pilihan yaitu pelatih kebugaran, mekanik kendaraan, atlet, pemadam kebakaran, petani, dan lain-lain.</li>
                </ol>'
            ],
            [
                'id' => 11,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'INVESTIGATIF',
                'content' => '<ol>
                    <li>Tipe investigatif ini senang belajar dan memecahkan soal-soal matematika dan ilmu pengetahuan alam (science), selalu menghindar untuk memimpin, menjual produk ataupun meyakinkan/ memengaruhi orang lain.</li>
                    <li>Sangat menjunjung tinggi nilai-nilai keilmuan dan melihat dirinya sebagai orang yang teliti, presisi, menjunjung nilai saintifik (scientific values), dan intelektual.</li>
                    <li>Karakter personal tipe ini mampu melakukan analisis, intelektual, pendiam, independen, dan ambisius. Aktivitas yang diminati berkaitan dengan kegiatan mengumpulkan data, menganalisis suatu hal, serta menyelesaikan suatu permasalahan secara intelektual.</li>
                    <li>Contoh karier yang dapat menjadi pilihan yaitu peneliti, dokter, analis sistem komputer, dan ilmuwan.</li>
                </ol>'
            ],
            [
                'id' => 12,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'ARTISTIK',
                'content' => '<ol>
                    <li>Tipe artistik senang melakukan aktivitas kreatif seperti melukis, drama, kerajinan, tari, musik maupun menulis kreatif, umumnya menghindari hal yang bersifat monoton dan aktivitas yang berulang.</li>
                    <li>Melihat dirinya sebagai orang yang ekspresif, original, dan independen.</li>
                    <li>Tipe ini memiliki preferensi pada hal-hal yang berkaitan dengan ide dan orang. Karakter personal individu ini cenderung ekspresif, impulsif, kreatif, dan mandiri. Aktivitas yang diminati berkaitan dengan kegiatan menggunakan imajinasi dalam membuat suatu karya dan mengekspresikan kreativitasnya.</li>
                    <li>Contoh karier yang dapat menjadi pilihan yaitu artis, seniman, penulis, fotografer, dan lain-lain.</li>
                </ol>'
            ],
            [
                'id' => 13,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'SOSIAL',
                'content' => '<ol>
                    <li>Tipe Sosial senang melakukan hal-hal yang membantu orang lain misalnya, mengajar, merawat, menyampaikan informasi. Tipe ini umumnya tidak suka atau menghindari bekerja dengan mesin atau peralatan dalam menyelesaikan tugasnya.</li>
                    <li>Menilai diri sebagai orang yang ringan tangan, penolong, mudah bergaul, dan dapat dipercaya serta senang menyelesaikan masalah-masalah sosial.</li>
                    <li>Karakter personal individu ini cenderung kooperatif, berempati, sopan, hangat, senang bersosialisasi, dan ramah. Aktivitas yang diminati berkaitan dengan kegiatan berinteraksi dengan orang lain, mengajar, dan membimbing.</li>
                    <li>Contoh karier yang dapat menjadi pilihan yaitu guru, psikolog, rohaniawan, perawat, dan lain-lain.</li>
                </ol>'
            ],
            [
                'id' => 14,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'GIAT',
                'content' => '<ol>
                    <li>Tipe giat ini senang memimpin dan meyakinkan/memengaruhi orang lain, juga menjual sesuatu barang maupun ide, umumnya menghindari kegiatan-kegiatan yang mengharuskan mereka melakukan observasi mendalam, pemikiran analitis dan saintifik.</li>
                    <li>Menyukai hal-hal terkait bisnis (menjual barang dan ide), sangat enerjetik, ambisius, dan mampu bersosialisasi.</li>
                    <li>Karakter personal individu dengan tipe ini cenderung persuasif, ramah, suka berpetualang, ambisius, dan asertif. Aktivitas yang diminati berkaitan dengan kegiatan memimpin, mengatur, mempersuasi, dan mengorganisasi orang-orang.</li>
                    <li>Contoh karier yang dapat menjadi pilihan yaitu pengusaha, pengacara, politisi, dan profesi lainnya yang serupa.</li>
                </ol>'
            ],
            [
                'id' => 15,
                'category' => 'personality',
                'development_area' => null,
                'type' => 'KONVENSIONAL',
                'content' => '<ol>
                    <li>Tipe konvensional senang mengutak-atik angka, catatan arsip, atau peralatan, sistematis dan terukur, umumnya menghindari hal-hal yang kurang jelas (ambigu) dan tidak terstruktur.</li>
                    <li>Melihat diri sebagai orang yang teratur dan mudah mengikuti aturan maupun rencana yang sudah ditetapkan.</li>
                    <li>Karakter personal individu dengan tipe ini cenderung hati-hati, mengikuti aturan, konservatif, bertanggung jawab, menyukai adanya aturan, menyukai lingkungan yang terstruktur. Aktivitas yang diminati berkaitan dengan kegiatan administrasi atau visual hobi, memerhatikan suatu hal secara detail, dan kegiatan sejenis.</li>
                    <li>Contoh karier yang dapat menjadi pilihan antara lain akuntan, editor, administrator, aktuaria.</li>
                </ol>'
            ]
        ];

        DB::table('results')->insert($results);
    }
}
