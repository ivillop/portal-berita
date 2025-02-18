<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([CategorySeeder::class, UserSeeder::class]);
        News::insert([
            [
                'title' => 'Erdogan Sapa Prabowo Saat Tiba di RI: Assalamualaikum, How Are You?',
                'slug' => 'erdogan-sapa-prabowo-saat-tiba-di-ri-assalamualaikum-how-are-you',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2025/02/11/presiden-turki-recep-tayyip-erdogan-tiba-di-jakarta-dan-disambut-langsung-oleh-presiden-prabowo-subianto-dokist_169.jpeg?w=700&q=90',
                'body' => 'Jakarta - Presiden RI Prabowo Subianto menyambut langsung kedatangan Presiden Turki Recep Tayyip Erdogan di Lanud Halim Perdanakusuma, Jakarta, hari ini. Prabowo pun berbincang ringan dengan Erdogan saat momen itu.
Dalam keterangan Tim Media Presiden, Selasa (11/2/2025), Erdogan tiba di Lanud Halim pada pukul 18.30 WIB. Erdogan disambut jajar kehormatan.
"Assalamualaikum, how are you?" sapa Erdogan ke Prabowo.',
                'author_id' => 1,
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Bahlil Godok Pembentukan Lembaga Pengawasan Penyaluran LPG 3 Kg',
                'slug' => 'bahlil-godok-pembentukan-lembaga-pengawasan-penyaluran-lpg-3kg',
                'image' => 'https://akcdn.detik.net.id/visual/2025/02/04/menteri-energi-dan-sumber-daya-mineral-esdm-bahlil-lahadalia-hingga-menteri-pertanian-andi-amran-sulaiman-dipanggil-presiden-p_169.jpeg?w=900&q=80',
                'body' => 'Jakarta - Menteri Energi dan Sumber Daya Mineral (ESDM), Bahlil Lahadalia mengaku hingga kini masih merumuskan lembaga yang nantinya bertugas untuk melakukan pengawasan terhadap penyaluran LPG 3 kg.
Hal ini dilakukan agar masyarakat bisa membeli LPG yang disubsidi oleh negara sesuai dengan harga yang sudah dipatok oleh pemerintah melalui Harga Eceran Tertinggi (HET).
"Kalau saya akan katakan bahwa harus ada lembaga yang mengawasi untuk LPG subsidi. Lembaga itu bisa BPH Migas atau lembaga lain, seperti lembaga ad-hoc," ungkap Bahlil di Jakarta, Selasa (11/2/2025).',
                'author_id' => 2,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Man City vs Real Madrid: Laga yang Aneh buat Bellingham',
                'slug' => 'man-city-vs-real-madrid-laga-yang-aneh-buat-bellingham',
                'image' => 'https://akcdn.detik.net.id/community/media/visual/2025/02/12/jude-bellingham_169.jpeg?w=700&q=90',
                'body' => 'Manchester - Real Madrid menang dramatis di markas Manchester City. Jude Bellingham menganggapnya sebagai pertandingan yang aneh. Kok bisa?
Madrid menang 3-2 atas Man City pada partai leg pertama play-off 16 besar Liga Champions, lewat comeback dramatis di Etihad Stadium, Rabu (12/2/2025) dini hari WIB. Dua kali tertinggal akibat gol Erling Haaland, Madrid membalas lewat Kylian Mbappe, Brahim Diaz, dan Jude Bellingham.
Dua gol terakhir Madrid itu tercipta di penghujung laga, masing-masing pada menit ke-86 dan 92, memberikan akhir yang amat dramatis. Itu juga menandai hasil manis atas dominasi mereka.',
                'author_id' => 3,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Dinkes Kepri Klaim Jumlah Warga Berobat ke Negeri Jiran Menurun',
                'slug' => 'dinkes-kepri-klaim-jumlah-warga-berobat-ke-negeri-jiran-menurun',
                'image' => 'https://akcdn.detik.net.id/visual/2025/02/11/sejumlah-warga-sedang-berobat-di-rumah-sakit-umum-daerah-rsud-raja-ahmad-tabib-provinsi-kepri-1_169.jpeg?w=650&q=90',
                'body' => 'Batam - Kepala Dinas Kesehatan (Kadinkes) Provinsi Kepulauan Riau (Kepri) Muhammad Bisri mengaku masih ada saja warga yang memilih  berobat ke negara tetangga seperti Singapura dan Malaysia dibanding di rumah sakit wilayah itu seperti RSUD Raja Ahmad Tabib, RS BP Batam, RS Awal Bros Batam, dan lainnya.
Dia mengatakan warga memilih ke negeri jiran, karena selama ini fasilitas kesehatan rumah sakit-rumah sakit yang ada di Kepri untuk penyakit tertentu belum tersedia. Selain itu, aktor kecepatan pelayanan dan geografis daerah sangat dekat dengan Singapura dan Malaysia juga menjadi pilihan warga berobat kedua negara tersebut.
Namun, sambungnya, jumlah warga yang berobat ke negeri jiran itu trennya sudah mulai menurun. Hal itu tak lepas dari kualitas dan jenis layanan kesehatan di provinsi tersebut.',
                'author_id' => 4,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Menkomdigi Dorong Kebijakan AI Dunia Perhatikan Negara Berkembang',
                'slug' => 'menkomdigi-dorong-kebijakan-ai-dunia-perhatikan-negara-berkembang',
                'image' => 'https://akcdn.detik.net.id/visual/2025/01/13/pelantikan-pejabat-kementerian-komdigi_169.jpeg?w=650&q=90',
                'body' => 'Jakarta - Menteri Komunikasi dan Digital (Menkomdigi) Meutya Hafid mendorong kebijakan kecerdasan buatan (AI) dunia berbasis prinsip inklusivitas, salah satunya memperhatikan kepentingan negara berkembang.
Meutya menegaskan Indonesia berkomitmen membangun tata kelola AI yang inklusif dan berimbang. Ia juga menyampaikan peran strategis Indonesia menjembatani kepentingan negara berkembang dan maju dalam kebijakan AI global.
"Indonesia percaya bahwa tata kelola AI harus berbasis keadilan, inklusivitas dan keamanan. Kami ingin memastikan bahwa kebijakan AI global tidak hanya mencerminkan kepentingan negara maju, tetapi juga memperhitungkan realitas negara berkembang seperti Indonesia," kata Meutya dalam sebuah keterangan, Senin (10/2).',
                'author_id' => 5,
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Manusia Sedang Berevolusi di Dataran Tinggi Tibet',
                'slug' => 'manusia-sedang-berevolusi-di-dataran-tinggi-tibet',
                'image' => 'https://asset.kompas.com/crops/UCqU1qZPoFCgA_WfsESDngTkMFE=/90x54:629x413/1200x800/data/photo/2017/04/06/2231840110.jpg',
                'body' => 'Manusia terus berkembang dan beradaptasi dengan lingkungan sekitarnya. Salah satu contoh nyata dari evolusi ini dapat ditemukan di Dataran Tinggi Tibet. Di ketinggian lebih dari 3.500 meter, di mana kadar oksigen jauh lebih rendah dibandingkan daerah dataran rendah, komunitas manusia dapat bertahan dan berkembang.
                Biasanya, manusia yang berada di lingkungan dengan kadar oksigen rendah akan mengalami hipoksia, yaitu kondisi di mana tubuh tidak mendapatkan cukup oksigen yang dibutuhkan untuk berfungsi dengan baik. Hal ini sering terjadi pada para pendaki gunung yang mengalami mabuk ketinggian. Namun, penduduk asli Tibet telah mengalami perubahan biologis yang memungkinkan mereka bertahan dalam kondisi tersebut. "Adaptasi terhadap hipoksia di dataran tinggi sangat menarik karena tekanan yang dialami cukup berat, dirasakan oleh semua orang yang berada di ketinggian tersebut, dan dapat diukur secara kuantitatif," ujar Cynthia Beall, seorang antropolog dari Case Western Reserve University, sebagaimana dikutip oleh ScienceAlert. Beall dan timnya telah melakukan penelitian selama bertahun-tahun untuk memahami bagaimana manusia menyesuaikan diri dengan lingkungan hipoksia. Dalam penelitian terbaru yang diterbitkan pada Oktober 2024, mereka menemukan bahwa penduduk Tibet memiliki ciri khas dalam sistem peredaran darah yang membantu pengangkutan oksigen.',
                'author_id' => 1,
                'category_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Asing Kabur Bawa Rp4,7 T, IHSG Sudah Ambruk 8%',
                'slug' => 'asing-kabur-bawa-rp4,7-t,-ihsg-sudah-ambruk-8%',
                'image' => 'https://akcdn.detik.net.id/visual/2020/08/06/ilutrasi-bursa-cnbc-indonesiamuhammad-sabki-3_169.jpeg?w=900&q=80',
                'body' => 'Jakarta - Indeks Harga Saham Gabungan (IHSG) masih belum bangkit dan kian terpuruk. Indeks terkoreksi 1,75% ke posisi 6.531,99 pada akhir perdagangan Selasa (11/2/2025).
Dengan demikian sepanjang bulan Februari yang baru berjalan 7 hari perdagangan saja, IHSG sudah ambruk 8,13%.
Dalam perdagangan kemarin, nilai transaksi tercatat mencapai Rp 12,69 triliun yang melibatkan 16,94 miliar saham yang ditransaksikan 1,28 juta kali. Sebanyak 171 saham naik, 424 turun, dan 198 stagnan.',
                'author_id' => 2,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Jadwal Siaran Langsung Red Sparks vs IBK Altos di Liga Voli Korea',
                'slug' => 'jadwal-siaran-langsung-red-sparks-vs-ibk-altos-di-liga-voli-korea',
                'image' => 'https://akcdn.detik.net.id/visual/2025/02/08/red-sparks-vs-hillstate_169.jpeg?w=650&q=90',
                'body' => 'Jakarta - Red Sparks akan melawan IBK Altos dalam laga lanjutan putaran kelima Liga Voli Korea. Berikut jadwal siaran langsung Red Sparks vs IBK Altos.
Red Sparks tidak ingin kehilangan momentum setelah menang di laga sebelumnya melawan Hillstate dengan skor 3-1. Melawan IBK juga akan jadi kesempatan buat anak asuh Ko Hee Jin untuk makin dekat dengan posisi kedua klasemen.
Megawati Hangestri Pertiwi dan kawan-kawan hanya berjarak tiga poin dari Hillstate. Artinya kemenangan atas IBK akan membuat persaingan menembus posisi dua besar semakin sengit.',
                'author_id' => 3,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Menkes Sebut 17 Ribu Warga Sudah Cek Kesehatan Gratis',
                'slug' => 'menkes-sebut-17-ribu-warga-sudah-cek-kesehatan-gratis',
                'image' => 'https://akcdn.detik.net.id/visual/2025/02/10/kemenkes-tinjau-kickoff-cek-kesehatan-gratis-di-puskesmas-surabaya_169.jpeg?w=650&q=90',
                'body' => 'Surabaya - Menteri Kesehatan (Menkes) Budi Gunadi Sadikin meninjau langsung pelaksanaan cek kesehatan di Puskesmas Manukan Kulon, Surabaya, Jawa Timur.
Budi mengatakan sudah ada 17 ribu warga yang diperiksa di seluruh Indonesia. Ia menyebut pemerintah ingin masyarakat bisa lebih sehat dengan pemeriksaan awal ini.',
                'author_id' => 4,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Ilmuwan Ajak Siswa di Siprus Daur Ulang Minyak Goreng Bekas Jadi BBM',
                'slug' => 'ilmuwan-ajak-siswa-di-siprus-daur-ulang-minyak-goreng-bekas-jadi-bbm',
                'image' => 'https://akcdn.detik.net.id/visual/2025/02/11/environment-cyprusoil_169.jpeg?w=650&q=90',
                'body' => 'Jakarta - Ilmuwan di Siprus mengajak siswa sekolah di negara tersebut melakukan daur ulang minyak goreng bekas menjadi bahan bakar.
Inisiatif ini diberi nama "Tiganokinisi" yang berarti wajan penggorengan. Para ilmuwan mengunjungi sekolah-sekolah dengan karavan, melakukan eksperimen ilmiah dan mendorong anak-anak membawa minyak jelantah dari rumah mereka yang kemudian dikumpulkan, disaring dan dijual untuk digunakan sebagai biodiesel.',
                'author_id' => 5,
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
