<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->delete();

        DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Angklung',
                'slug' => 'angklung',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1688565226/et2agukrguygnszozffs.jpg',
                'created_at' => '2023-07-05 13:53:46',
                'updated_at' => '2023-07-05 13:53:46',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Kecapi',
                'slug' => 'kecapi',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1688605574/wkbomqpf1drokhq5mgtl.jpg',
                'created_at' => '2023-07-06 01:06:15',
                'updated_at' => '2023-07-06 01:06:15',
            ),
        ));


    }
}
