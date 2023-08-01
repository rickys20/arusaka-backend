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
                'name' => 'ajaib',
                'slug' => 'ajaib',
                'email' => 'contact@ajaib.com',
                'logo' => 'https://ajaib-wp-s3-artifact.s3.ap-southeast-1.amazonaws.com/img/2022/06/16190056/AJAIB-ASA-BLUE.png',
                'contact' => '031-525252',
                'address' => 'Jakarta Kuning',
            ),
        ));


    }
}
