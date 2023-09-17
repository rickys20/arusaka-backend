<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('partners')->delete();

        DB::table('partners')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Baksara',
                'email' => 'cs@baksara.com',
                'contact' => '+62852-3844-8854',
                'address' => 'Keputih, Surabaya',
                'image_profile' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691316443/phkykuphfa9jm1xbqwks.jpg',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Karabels',
                'email' => 'cs@karabels.com',
                'contact' => '+62852-3844-8854',
                'address' => 'SMAN 15 Surabaya',
                'image_profile' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691316510/ihyersi3sje2grii3gdo.jpg',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Lamahyangan',
                'email' => 'cs@lamahyangan.com',
                'contact' => '+62812-3195-8067',
                'address' => 'Jatimulyo, Surabaya',
                'image_profile' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691316510/ihyersi3sje2grii3gdo.jpg',
            ),
        ));


    }
}
