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
                'name' => 'Pengenalan Alat Musik Angklung toel',
                'slug' => 'pengenalan-alat-musik-angklung-toel',
                'description' => 'Belajar mengenai sejarah dan teknik dasar bermain alat musik Angklung toel.',
                'status' => 'ACTIVE',
                'image' => 'https://img.okezone.com/content/2012/12/08/408/729284/J7WcThtona.jpg',
                'price' => 99.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Pengenalan Alat Musik Angklung Baduy',
                'slug' => 'pengenalan-alat-musik-angklung-baduy',
                'description' => 'Belajar mengenai sejarah dan teknik dasar bermain alat musik Angklung Baduy, alat musik khas daerah Baduy.',
                'status' => 'ACTIVE',
                'image' => 'https://sejarahlengkap.com/wp-content/uploads/2017/04/angklung.jpg',
                'price' => 99.99,
                'categories_id' => 1,
                'partners_id' => 1,
            ),

            2 =>
            array (
                'name' => 'Pengenalan Alat Musik Angklung reog',
                'slug' => 'pengenalan-alat-musik-angklung-reog',
                'description' => 'Belajar mengenai sejarah dan teknik dasar bermain alat musik Angklung reog, alat musik khas daerah reog.',
                'status' => 'ACTIVE',
                'image' => ' http://wadaya.rey1024.com/api/uploads/16522701321536283835.jpg',
                'price' => 99.99,
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
                'categories_id' => 2,
                'partners_id' => 1,
            ),
        ));

    }
}
