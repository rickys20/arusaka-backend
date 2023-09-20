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
<<<<<<< HEAD
                'name' => 'Dasar Angklung Toel',
                'slug' => 'dasar-angklung-toel',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/AVsETctOQAk?si=c65ffqB88VP3n4_d" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pelajaran dasar untuk mempelajari angklung Toel.',
                'content' => 'Konten pembelajaran dasar angklung Toel akan memberikan pemahaman tentang cara bermain angklung dan elemen-elemen dasar yang perlu dikuasai.',
=======
                'name' => 'Dasar Angklung toel',
                'slug' => 'dasar-angklung-toel',
                'video' => 'www.youtube.com',
                'description' => 'ok',
                'content' => 'ok',
>>>>>>> c022205 (new branch)
                'courses_id' => 1,
            ),
            1 =>
            array (
<<<<<<< HEAD
                'name' => 'Angklung di Mata Dunia',
                'slug' => 'angklung-di-mata-dunia',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/0as_omiQsME?si=w22tGVa0eiiag5fk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pandangan global tentang angklung dan pengaruhnya.',
                'content' => 'Dalam pelajaran ini, kita akan menjelajahi bagaimana angklung telah dikenal di berbagai belahan dunia dan memahami dampaknya terhadap budaya musik.',
=======
                'name' => 'Not Angklung Toel',
                'slug' => 'not-angklung-toel',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
>>>>>>> c022205 (new branch)
                'courses_id' => 1,
            ),
            2 =>
            array (
<<<<<<< HEAD
                'name' => 'Angklung Toel : Bohemian Rhapsody',
                'slug' => 'angklung-toel-bohemian-rapsody',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/tWcSBql597s?si=COJFLqyb1eBmEgK7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pentas angklung dengan tampilan unik dari Bohemian Rhapsody.',
                'content' => 'Mari kita telusuri bagaimana angklung Toel membawakan lagu terkenal "Bohemian Rhapsody" dengan nuansa yang berbeda dan kreatif.',
=======
                'name' => 'lagu dasar angklung toel',
                'slug' => 'lagu-dasar-angklung-toel',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
>>>>>>> c022205 (new branch)
                'courses_id' => 1,
            ),
            3 =>
            array (
<<<<<<< HEAD
                'name' => 'Dasar Angklung Baduy',
                'slug' => 'dasar-angklung-baduy',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HbmqpbyCGpE?si=g4DmqY0_uIYtAWV_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pelajaran dasar untuk memahami angklung Baduy.',
                'content' => 'Dalam pembelajaran ini, kita akan fokus pada fondasi bermain angklung Baduy, termasuk teknik dasar dan pentingnya dalam budaya masyarakat Baduy.',
=======
                'name' => 'Dasar Angklung baduy',
                'slug' => 'dasar-angklung-baduy',
                'video' => 'www.youtube.com',
                'description' => 'ok',
                'content' => 'ok',
>>>>>>> c022205 (new branch)
                'courses_id' => 2,
            ),
            4 =>
            array (
<<<<<<< HEAD
                'name' => 'Angklung Baduy di Mata Masyarakat',
                'slug' => 'angklung-baduy-di-mata-masyarakat',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FaVHK7aR5Eg?si=BPkHKGCrsGfFvDXs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengamatan terhadap peran angklung Baduy dalam masyarakat.',
                'content' => 'Dalam pelajaran ini, kita akan mengamati bagaimana angklung Baduy memiliki peran penting dalam masyarakat dan bagaimana hal tersebut diapresiasi oleh masyarakat luas.',
=======
                'name' => 'Not Angklung baduy',
                'slug' => 'not-angklung-baduy',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
>>>>>>> c022205 (new branch)
                'courses_id' => 2,
            ),
            5 =>
            array (
<<<<<<< HEAD
                'name' => 'Angklung Baduy dengan Tarian',
                'slug' => 'angklung-baduy-dengan-tarian',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/KgiuOIH0Js0?si=2SORBYA53KxVH5jM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pertunjukan angklung Baduy yang disertai dengan tarian tradisional.',
                'content' => 'Dalam pembelajaran ini, kita akan menyaksikan bagaimana angklung Baduy diiringi oleh tarian tradisional khas yang melengkapi pengalaman budaya secara menyeluruh.',
                'courses_id' => 2,
            ),
            6 =>
            array (
                'name' => 'Pengenalan Instrumen Demung',
                'slug' => 'pengenalan-instrumen-demung',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/N0OsAb4zN6M?si=c1Ow583XcohO33Jq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan alat musik demung, meliputi sejarah, karakteristik, dan teknik bermain alat musik tradisional ini.',
                'content' => 'Dalam pembelajaran ini, kita akan menjelajahi alat musik demung secara mendalam, termasuk sejarahnya, karakteristik uniknya, dan teknik-teknik bermain yang memukau.',
                'courses_id' => 7,
            ),
            7 =>
            array (
                'name' => 'Teknik Dasar Menabuh Demung',
                'slug' => 'teknik-dasar-menabuh-demung',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/N0OsAb4zN6M?si=U7sSbiIXWpONfcQK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik dasar menabuh demung untuk pemula, termasuk pembelajaran posisi tangan dan gerakan dasar.',
                'content' => 'Dalam pembelajaran ini, kita akan memahami dengan lebih mendalam teknik dasar menabuh demung. Mulai dari posisi tangan yang benar hingga gerakan dasar yang perlu dikuasai untuk memainkan alat musik ini dengan lancar.',
                'courses_id' => 7,
            ),
            8 =>
            array (
                'name' => 'Latihan Menabuh Demung',
                'slug' => 'latihan-menabuh-demung',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/sR9oAeElxos?si=Q6xlGaitySeSMY0J" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Sesi latihan intensif untuk mengasah keterampilan menabuh demung dengan variasi latihan yang menantang.',
                'content' => 'Dalam sesi latihan ini, kita akan fokus pada pengembangan keterampilan menabuh demung. Melalui berbagai variasi latihan yang menantang, Anda akan meningkatkan keahlian bermain alat musik ini.',
                'courses_id' => 7,
            ),
            9 =>
            array (
                'name' => 'Pengenalan Instrumen Kendang',
                'slug' => 'pengenalan-instrumen-kendang',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/MdE97TY1xOg?si=L7xEVRAN7iMSKL2Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan instrumen kendang, termasuk sejarah, jenis kendang, dan peran pentingnya dalam musik tradisional.',
                'content' => 'Dalam pengenalan ini, kita akan menjelajahi lebih dalam instrumen kendang. Anda akan memahami sejarahnya, berbagai jenis kendang yang ada, serta peran pentingnya dalam musik tradisional.',
                'courses_id' => 8,
            ),
            10 =>
            array (
                'name' => 'Teknik Dasar Menabuh Kendang',
                'slug' => 'teknik-dasar-menabuh-kendang',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Z-yOsjrdKng?si=3eLCiNEq5OS3e3FQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik dasar menabuh kendang untuk pemula, meliputi posisi tangan, gerakan dasar, dan ritme dasar.',
                'content' => 'Dalam pembelajaran ini, kita akan memahami teknik dasar menabuh kendang dengan baik. Termasuk dalam pembelajaran ini adalah pembahasan posisi tangan yang benar, gerakan dasar yang penting, serta pemahaman ritme dasar yang harus dikuasai.',
                'courses_id' => 8,
            ),
            11 =>
            array (
                'name' => 'Latihan Menabuh Kendang',
                'slug' => 'latihan-menabuh-kendang',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/15x5Fy4dTKE?si=LptChRNI0vZzVkUM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Sesi latihan intensif untuk meningkatkan keterampilan menabuh kendang dengan latihan-latihan yang bervariasi.',
                'content' => 'Dalam sesi latihan ini, Anda akan fokus pada pengembangan keterampilan menabuh kendang Anda. Kami akan memberikan berbagai latihan yang bervariasi dan menantang untuk membantu Anda mengasah kemampuan bermain kendang.',
                'courses_id' => 8,
            ),
            12 =>
            array (
                'name' => 'Tutorial Rinding Lumajang',
                'slug' => 'tutorial-rinding-lumajang',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/sW2vECHmfZI?si=PSAwTSfcBYCbDXBL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Rinding Lumajang adalah alat musik tradisional berbahan dasar bambu berjenis harpa mulut. Di sebagian wilayah di Indonesia mempunyai nama masing masing',
                'content' => 'Tutorial Rinding Lumajang akan membawa Anda ke dalam dunia alat musik tradisional yang unik ini. Rinding Lumajang, yang juga dikenal dengan nama lain di beberapa wilayah di Indonesia, adalah alat musik berbahan dasar bambu berjenis harpa mulut. Dalam tutorial ini, Anda akan mendapatkan pemahaman mendalam tentang sejarah, cara bermain, dan nilai budaya dari alat musik yang khas ini. Serta, kami akan memandu Anda melalui langkah-langkah untuk memainkan Rinding Lumajang dengan baik dan benar. Selamat menikmati pembelajaran ini!',
                'courses_id' => 6,
            ),
            13 =>
            array (
                'name' => 'Teknik Vocal Robotic Rinding',
                'slug' => 'teknik-vocal-robotic-rinding',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/jP7IwSzVuF0?si=X2NdUAnvVPwhSkdW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik vokal robotic dalam permainan Rinding Lumajang untuk menciptakan suara unik dan menarik.',
                'content' => 'Dalam pembelajaran ini, kita akan menjelaskan secara rinci teknik vokal robotic yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar cara menciptakan suara unik dan menarik yang memperkaya pengalaman bermain alat musik ini. Tutorial ini akan membantu Anda memahami prinsip-prinsip dasar teknik vokal robotic dan bagaimana menggabungkannya dengan permainan Rinding Lumajang.',
                'courses_id' => 6,
            ),
            14 =>
            array (
                'name' => 'Teknik Rhythm Beat Perkusi Rinding',
                'slug' => 'teknik-rhythm-beat-perkusi-rinding',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FOSyrDR9wU8?si=G8fhL4m_NewLtOBI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik bermain ritme dan beat perkusi pada Rinding Lumajang untuk menghasilkan pola suara yang menarik.',
                'content' => 'Dalam tutorial ini, Anda akan diajarkan berbagai teknik bermain ritme dan beat perkusi pada Rinding Lumajang. Anda akan belajar bagaimana menciptakan pola suara yang menarik dan bervariasi untuk menghasilkan musik yang kaya dan dinamis. Kami akan membahas prinsip-prinsip dasar dari teknik ini dan memberikan panduan praktis untuk mengembangkan keterampilan bermain perkusi pada Rinding Lumajang.',
                'courses_id' => 6,
            ),
            15 =>
            array (
                'name' => 'Teknik Tauhid Robotic Style Rinding',
                'slug' => 'teknik-tauhid-robotic-style-rinding',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/feclULpBHfA?si=x9w1j9O5PH5stVwZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik Tauhid Robotic Style dalam permainan Rinding Lumajang untuk menciptakan gaya unik dan ekspresif.',
                'content' => 'Dalam tutorial ini, Anda akan mempelajari secara mendalam teknik Tauhid Robotic Style yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar bagaimana menciptakan gaya bermain yang unik dan ekspresif yang menggabungkan elemen-elemen Tauhid Robotic Style dengan permainan Rinding Lumajang. Kami akan memberikan panduan langkah demi langkah untuk membantu Anda menguasai teknik ini dan menciptakan musik yang unik.',
                'courses_id' => 6,
            ),
            16 =>
            array (
                'name' => 'Teknik dan Style 2 Maestro Rinding',
                'slug' => 'teknik-dan-style-2-maestro-rinding',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/lTRAUXZtlyM?si=FoKt6bLzm0GriIhe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik dan gaya bermain dari dua maestro Rinding Lumajang yang berpengalaman.',
                'content' => 'Dalam tutorial ini, kita akan memperkenalkan Anda pada teknik dan gaya bermain dari dua maestro berpengalaman dalam permainan Rinding Lumajang. Anda akan mendapatkan wawasan yang mendalam tentang berbagai teknik bermain dan gaya musikal yang unik dari maestro-maestro ini. Tutorial ini akan membantu Anda memahami sejarah dan perkembangan Rinding Lumajang serta menggali lebih dalam ke dalam keahlian mereka dalam permainan alat musik ini.',
                'courses_id' => 6,
            ),
            17 =>
            array (
                'name' => 'Style Pak Toyan Rinding Dadapan',
                'slug' => 'style-pak-toyan-rinding-dadapan',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HQJZtibrws4?si=VkNt4TGw-cci2R-P" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan gaya bermain unik dari Pak Toyan dalam permainan Rinding Dadapan.',
                'content' => 'Dalam tutorial ini, kita akan menggali lebih dalam tentang gaya bermain yang unik dari Pak Toyan dalam permainan Rinding Dadapan. Anda akan memahami ciri khas gaya musikalnya, serta bagaimana ia menggabungkan teknik-teknik khusus untuk menciptakan suara yang unik dan memukau. Tutorial ini akan membantu Anda memahami peran penting Pak Toyan dalam melestarikan warisan musik Rinding Dadapan.',
                'courses_id' => 6,
            ),
            18 =>
            array (
                'name' => 'Teknik Vibrasi Rinding',
                'slug' => 'teknik-vibrasi-rinding',
                'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/kRqhPodgDj8?si=53-wU6zCkj4KtbVp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'description' => 'Pengenalan teknik vibrasi dalam permainan Rinding Lumajang untuk menciptakan efek suara yang khas.',
                'content' => 'Dalam tutorial ini, kita akan membahas teknik vibrasi yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar cara menciptakan efek suara yang khas dan menarik melalui penggunaan teknik vibrasi pada alat musik ini. Kami akan memberikan panduan langkah demi langkah untuk membantu Anda menguasai teknik ini dan menggunakannya dalam permainan Rinding Lumajang.',
                'courses_id' => 6,
            ),
=======
                'name' => 'lagu dasar angklung baduy',
                'slug' => 'lagu-dasar-angklung-baduy',
                'video' => 'www.google.com',
                'description' => 'Hola madrisdistas en curso',
                'content' => 'sosaosoasoaosaosaosao aoskdoamoasd s asodksoadmmoasm',
                'courses_id' => 2,
            ),
>>>>>>> c022205 (new branch)
        ));
    }
}
