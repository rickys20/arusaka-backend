<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('materials')->delete();

        DB::table('materials')->insert(array (
            0 =>
            array (
                'id' => 2,
                'name' => 'angklung jawir bab 1 revisi',
                'slug' => 'angklung-jawir-bab-1-revisi',
                'video' => 'www.youtube.com',
                'description' => 'ok',
                'content' => 'ok',
                'courses_id' => 2,
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Angklung Jawir Bab 2',
                'slug' => 'angklung-jawir-bab-2',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 2,
            ),
        ));


    }
}
