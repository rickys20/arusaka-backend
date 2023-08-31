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
                'name' => 'baksara',
                'email' => 'cs@baksara.com',
                'contact' => '+62852-3844-8854',
                'address' => 'Keputih, Surabaya',
                'image_profile' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691316443/phkykuphfa9jm1xbqwks.jpg',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'traveloka',
                'email' => 'cs@traveloka.com',
                'contact' => '+62853-1111-1010',
                'address' => 'BSD City, Tangerang',
                'image_profile' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1691316510/ihyersi3sje2grii3gdo.jpg',
            ),
        ));


    }
}
