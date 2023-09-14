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
                'name' => 'Dasar Angklung toel',
                'slug' => 'dasar-angklung-toel',
                'video' => 'www.youtube.com',
                'description' => 'ok',
                'content' => 'ok',
                'courses_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Not Angklung Toel',
                'slug' => 'not-angklung-toel',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 1,
            ),
            2 =>
            array (
                'name' => 'lagu dasar angklung toel',
                'slug' => 'lagu-dasar-angklung-toel',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 1,
            ),
            3 =>
            array (
                'name' => 'Dasar Angklung baduy',
                'slug' => 'dasar-angklung-baduy',
                'video' => 'www.youtube.com',
                'description' => 'ok',
                'content' => 'ok',
                'courses_id' => 2,
            ),
            4 =>
            array (
                'name' => 'Not Angklung baduy',
                'slug' => 'not-angklung-baduy',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 2,
            ),
            5 =>
            array (
                'name' => 'lagu dasar angklung baduy',
                'slug' => 'lagu-dasar-angklung-baduy',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 2,
            ),
        ));
    }
}
