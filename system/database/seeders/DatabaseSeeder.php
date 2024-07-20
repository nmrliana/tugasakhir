<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

          \App\Models\Karyawan::factory()->create([
           'karyawan_nama' => 'admin',
           'email' => 'admin@gmail.com',
           'karyawan_jobdesk' => 'Super Admin',
           'karyawan_notlp' => '081234567890',
           'karyawan_posisi' => 0,
           'password' => bcrypt('admin'),

       ]);

          \App\Models\Toko::factory()->create([
           'judul' => 'Rm. Alas Daun Ketapang',
           'alamat' => 'Jl. KH.Mansyur, Tengah, Kec. Delta Pawan, Kabupaten Ketapang, Kalimantan Barat 78811',
           'tentang' => 'Restoran Garuda merupakan perusahaan swasta yang terbentuk perorangan. Didirikan pada tanggal 9 oktober 1976 berlokasi di jalan Pemuda No. 20 Medan, yang kemudian ditetapkan sebagai Rumah Makan Garuda I sekaligus sebagai kantor pusat dan administrasinya. Pada awalnya restoran ini hanya berupa rumah makan yang diberi nama "Rumah Makan dan Buffet Garuda".

Rumah Makan Garuda bergerak dibidang mengelolah makanan yang spesifik yaitu Minang dan Melayu, dimana alasan untuk mendirikan rumah makan ini adalah merupakan hasil survey bahwa masih kurangnya sarana rumah makan terutama yang menyediakan makanan spesifik Minang dan Melayu dikota Medan. Dengan melihat kesempatan inilah, maka didirikanlah Rumah Makan Garuda pada tahun 1976. Bidang usaha ini terus berkembang hingga saat ini, dimana terdapat beberapa usaha sejenis yang dikelola oleh pihak lain.',
           'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63804.34541227245!2d109.9793844848374!3d-1.835312977405572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e0519004e851743%3A0xd0e861cad81b8f65!2sRM%20alas%20daun%20ketapang!5e0!3m2!1sen!2sid!4v1718805899341!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
           'notlp' => '081234567890',
           'email' => 'alasdaun@example.com',

       ]);
    }
}
