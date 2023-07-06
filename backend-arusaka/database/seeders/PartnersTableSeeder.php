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
                'email' => 'contact@ajaib.com',
                'contact' => '031-525252',
                'address' => 'Jakarta Kuning',
            ),
        ));


    }
}
