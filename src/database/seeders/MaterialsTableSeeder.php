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
                'name' => 'Dasar Angklung Toel',
                'slug' => 'dasar-angklung-toel',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/AVsETctOQAk?si=c65ffqB88VP3n4_d" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pelajaran dasar untuk mempelajari angklung Toel.',
                'content' => 'Konten pembelajaran dasar angklung Toel akan memberikan pemahaman tentang cara bermain angklung dan elemen-elemen dasar yang perlu dikuasai.',
                'courses_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Angklung di Mata Dunia',
                'slug' => 'angklung-di-mata-dunia',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/0as_omiQsME?si=w22tGVa0eiiag5fk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pandangan global tentang angklung dan pengaruhnya.',
                'content' => 'Dalam pelajaran ini, kita akan menjelajahi bagaimana angklung telah dikenal di berbagai belahan dunia dan memahami dampaknya terhadap budaya musik.',
                'courses_id' => 1,
            ),
            2 =>
            array (
                'name' => 'Angklung Toel : Bohemian Rhapsody',
                'slug' => 'angklung-toel-bohemian-rapsody',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/tWcSBql597s?si=COJFLqyb1eBmEgK7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pentas angklung dengan tampilan unik dari Bohemian Rhapsody.',
                'content' => 'Mari kita telusuri bagaimana angklung Toel membawakan lagu terkenal "Bohemian Rhapsody" dengan nuansa yang berbeda dan kreatif.',
                'courses_id' => 1,
            ),
            3 =>
            array (
                'name' => 'Dasar Angklung Baduy',
                'slug' => 'dasar-angklung-baduy',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HbmqpbyCGpE?si=g4DmqY0_uIYtAWV_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pelajaran dasar untuk memahami angklung Baduy.',
                'content' => 'Dalam pembelajaran ini, kita akan fokus pada fondasi bermain angklung Baduy, termasuk teknik dasar dan pentingnya dalam budaya masyarakat Baduy.',
                'courses_id' => 2,
            ),
            4 =>
            array (
                'name' => 'Angklung Baduy di Mata Masyarakat',
                'slug' => 'angklung-baduy-di-mata-masyarakat',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FaVHK7aR5Eg?si=BPkHKGCrsGfFvDXs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengamatan terhadap peran angklung Baduy dalam masyarakat.',
                'content' => 'Dalam pelajaran ini, kita akan mengamati bagaimana angklung Baduy memiliki peran penting dalam masyarakat dan bagaimana hal tersebut diapresiasi oleh masyarakat luas.',
                'courses_id' => 2,
            ),
            5 =>
            array (
                'name' => 'Angklung Baduy dengan Tarian',
                'slug' => 'angklung-baduy-dengan-tarian',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/KgiuOIH0Js0?si=2SORBYA53KxVH5jM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pertunjukan angklung Baduy yang disertai dengan tarian tradisional.',
                'content' => 'Dalam pembelajaran ini, kita akan menyaksikan bagaimana angklung Baduy diiringi oleh tarian tradisional khas yang melengkapi pengalaman budaya secara menyeluruh.',
                'courses_id' => 2,
            ),
        ));
    }
}
