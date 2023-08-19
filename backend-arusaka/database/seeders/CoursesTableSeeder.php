<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('courses')->delete();

        DB::table('courses')->insert(array (
            0 =>
            array (
                'name' => 'Pengenalan Alat Musik Gambus',
                'slug' => 'pengenalan-alat-musik-gambus',
                'description' => 'Belajar mengenai sejarah dan teknik dasar bermain alat musik gambus, alat musik khas daerah Aceh.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/gambus_tmxepc.jpg',
                'price' => 99.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Tutorial Suling Sunda',
                'slug' => 'tutorial-suling-sunda',
                'description' => 'Panduan lengkap belajar memainkan suling Sunda, alat musik tradisional dari Jawa Barat.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328240/suling-bambu_qtywsg.jpg',
                'price' => 149.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            2 =>
            array (
                'name' => 'Materi Dasar Karawitan Jawa',
                'slug' => 'materi-dasar-karawitan-jawa',
                'description' => 'Pelajaran dasar dalam seni musik Karawitan Jawa, termasuk teori dan praktik memainkan alat musik tradisional Jawa.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/karawitan-jawa_i0cwpz.jpg',
                'price' => 79.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            3 =>
            array (
                'name' => 'Tutorial Angklung Bali',
                'slug' => 'tutorial-angklung-bali',
                'description' => 'Belajar memainkan angklung, alat musik khas Bali yang unik dan menarik.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/bali-angklung_lkq3nr.jpg',
                'price' => 129.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            4 =>
            array (
                'name' => 'Pengenalan Kecapi Minangkabau',
                'slug' => 'pengenalan-kecapi-minangkabau',
                'description' => 'Pengenalan alat musik kecapi yang berasal dari Minangkabau, Sumatera Barat.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/Kacapi-minangkabau_lahj0g.jpg',
                'price' => 89.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            5 =>
            array (
                'name' => 'Tutorial Rebana Betawi',
                'slug' => 'tutorial-rebana-betawi',
                'description' => 'Panduan belajar memainkan rebana, alat musik tradisional khas Betawi.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328240/rebana-betawi_gjchn4.jpg',
                'price' => 109.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            6 =>
            array (
                'name' => 'Materi Dasar Gendang Melayu',
                'slug' => 'materi-dasar-gendang-melayu',
                'description' => 'Materi dasar bermain gendang Melayu, alat musik yang populer di daerah Riau dan Kepulauan Riau.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/gendang-melayu_gjocrx.jpg',
                'price' => 79.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            7 =>
            array (
                'name' => 'Pengenalan Seruling Batak',
                'slug' => 'pengenalan-seruling-batak',
                'description' => 'Belajar memainkan seruling Batak, alat musik tradisional dari Sumatera Utara.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328240/seruling-batak_zkssfl.jpg',
                'price' => 119.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            8 =>
            array (
                'name' => 'Tutorial Kolintang Sulawesi',
                'slug' => 'tutorial-kolintang-sulawesi',
                'description' => 'Panduan lengkap memainkan kolintang, alat musik tradisional suku Minahasa di Sulawesi Utara.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328239/kolintang-sulawesi_gpnov9.jpg',
                'price' => 139.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            9 =>
            array (
                'name' => 'Materi Dasar Talempong Sumatera',
                'slug' => 'materi-dasar-talempong-sumatera',
                'description' => 'Materi dasar bermain talempong, alat musik tradisional Minangkabau dari Sumatera Barat.',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691328240/telempong_vowwwf.jpg',
                'price' => 89.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
        ));

    }
}
