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
                'id' => 2,
                'name' => 'Angklung Jawir',
                'slug' => 'angklung-jawir',
                'description' => 'Hola madrisdistas en curso',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1688614844/zr37m66qmmul2dfegq1r.png',
                'price' => 120000,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Kecapi Jawir',
                'slug' => 'kecapi-jawir',
                'description' => 'Hola madrisdistas en curso',
                'status' => 'ACTIVE',
                'image' => 'https://res.cloudinary.com/dz2arrelg/image/upload/v1688619757/ofcqqevxznez5wjo9u1k.png',
                'price' => 120000,
                'categories_id' => 1,
                'partners_id' => 1,
            ),
        ));


    }
}
