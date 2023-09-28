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
                'video' => 'https://youtu.be/AVsETctOQAk',
                'description' => 'Pelajaran dasar untuk mempelajari angklung Toel.',
                'content' => 'Konten pembelajaran dasar angklung Toel akan memberikan pemahaman tentang cara bermain angklung dan elemen-elemen dasar yang perlu dikuasai.',
                'courses_id' => 1,
            ),
            1 =>
            array (
                'name' => 'Angklung di Mata Dunia',
                'slug' => 'angklung-di-mata-dunia',
                'video' => 'https://youtu.be/0as_omiQsME',
                'description' => 'Pandangan global tentang angklung dan pengaruhnya.',
                'content' => 'Dalam pelajaran ini, kita akan menjelajahi bagaimana angklung telah dikenal di berbagai belahan dunia dan memahami dampaknya terhadap budaya musik.',
                'courses_id' => 1,
            ),
            2 =>
            array (
                'name' => 'Angklung Toel : Bohemian Rhapsody',
                'slug' => 'angklung-toel-bohemian-rapsody',
                'video' => 'https://youtu.be/tWcSBql597s',
                'description' => 'Pentas angklung dengan tampilan unik dari Bohemian Rhapsody.',
                'content' => 'Mari kita telusuri bagaimana angklung Toel membawakan lagu terkenal "Bohemian Rhapsody" dengan nuansa yang berbeda dan kreatif.',
                'courses_id' => 1,
            ),
            3 =>
            array (
                'name' => 'Dasar Angklung Baduy',
                'slug' => 'dasar-angklung-baduy',
                'video' => 'https://youtu.be/HbmqpbyCGpE',
                'description' => 'Pelajaran dasar untuk memahami angklung Baduy.',
                'content' => 'Dalam pembelajaran ini, kita akan fokus pada fondasi bermain angklung Baduy, termasuk teknik dasar dan pentingnya dalam budaya masyarakat Baduy.',
                'courses_id' => 2,
            ),
            4 =>
            array (
                'name' => 'Angklung Baduy di Mata Masyarakat',
                'slug' => 'angklung-baduy-di-mata-masyarakat',
                'video' => 'https://youtu.be/FaVHK7aR5Eg',
                'description' => 'Pengamatan terhadap peran angklung Baduy dalam masyarakat.',
                'content' => 'Dalam pelajaran ini, kita akan mengamati bagaimana angklung Baduy memiliki peran penting dalam masyarakat dan bagaimana hal tersebut diapresiasi oleh masyarakat luas.',
                'courses_id' => 2,
            ),
            5 =>
            array (
                'name' => 'Angklung Baduy dengan Tarian',
                'slug' => 'angklung-baduy-dengan-tarian',
                'video' => 'https://youtu.be/KgiuOIH0Js0',
                'description' => 'Pertunjukan angklung Baduy yang disertai dengan tarian tradisional.',
                'content' => 'Dalam pembelajaran ini, kita akan menyaksikan bagaimana angklung Baduy diiringi oleh tarian tradisional khas yang melengkapi pengalaman budaya secara menyeluruh.',
                'courses_id' => 2,
            ),
            6 =>
            array (
                'name' => 'Pengenalan Instrumen Demung',
                'slug' => 'pengenalan-instrumen-demung',
                'video' => 'https://youtu.be/N0OsAb4zN6M',
                'description' => 'Pengenalan alat musik demung, meliputi sejarah, karakteristik, dan teknik bermain alat musik tradisional ini.',
                'content' => 'Dalam pembelajaran ini, kita akan menjelajahi alat musik demung secara mendalam, termasuk sejarahnya, karakteristik uniknya, dan teknik-teknik bermain yang memukau.',
                'courses_id' => 7,
            ),
            7 =>
            array (
                'name' => 'Teknik Dasar Menabuh Demung',
                'slug' => 'teknik-dasar-menabuh-demung',
                'video' => 'https://youtu.be/N0OsAb4zN6M',
                'description' => 'Pengenalan teknik dasar menabuh demung untuk pemula, termasuk pembelajaran posisi tangan dan gerakan dasar.',
                'content' => 'Dalam pembelajaran ini, kita akan memahami dengan lebih mendalam teknik dasar menabuh demung. Mulai dari posisi tangan yang benar hingga gerakan dasar yang perlu dikuasai untuk memainkan alat musik ini dengan lancar.',
                'courses_id' => 7,
            ),
            8 =>
            array (
                'name' => 'Latihan Menabuh Demung',
                'slug' => 'latihan-menabuh-demung',
                'video' => 'https://youtu.be/sR9oAeElxos',
                'description' => 'Sesi latihan intensif untuk mengasah keterampilan menabuh demung dengan variasi latihan yang menantang.',
                'content' => 'Dalam sesi latihan ini, kita akan fokus pada pengembangan keterampilan menabuh demung. Melalui berbagai variasi latihan yang menantang, Anda akan meningkatkan keahlian bermain alat musik ini.',
                'courses_id' => 7,
            ),
            9 =>
            array (
                'name' => 'Pengenalan Instrumen Kendang',
                'slug' => 'pengenalan-instrumen-kendang',
                'video' => 'https://youtu.be/MdE97TY1xOg',
                'description' => 'Pengenalan instrumen kendang, termasuk sejarah, jenis kendang, dan peran pentingnya dalam musik tradisional.',
                'content' => 'Dalam pengenalan ini, kita akan menjelajahi lebih dalam instrumen kendang. Anda akan memahami sejarahnya, berbagai jenis kendang yang ada, serta peran pentingnya dalam musik tradisional.',
                'courses_id' => 8,
            ),
            10 =>
            array (
                'name' => 'Teknik Dasar Menabuh Kendang',
                'slug' => 'teknik-dasar-menabuh-kendang',
                'video' => 'https://youtu.be/Z-yOsjrdKng',
                'description' => 'Pengenalan teknik dasar menabuh kendang untuk pemula, meliputi posisi tangan, gerakan dasar, dan ritme dasar.',
                'content' => 'Dalam pembelajaran ini, kita akan memahami teknik dasar menabuh kendang dengan baik. Termasuk dalam pembelajaran ini adalah pembahasan posisi tangan yang benar, gerakan dasar yang penting, serta pemahaman ritme dasar yang harus dikuasai.',
                'courses_id' => 8,
            ),
            11 =>
            array (
                'name' => 'Latihan Menabuh Kendang',
                'slug' => 'latihan-menabuh-kendang',
                'video' => 'https://youtu.be/15x5Fy4dTKE',
                'description' => 'Sesi latihan intensif untuk meningkatkan keterampilan menabuh kendang dengan latihan-latihan yang bervariasi.',
                'content' => 'Dalam sesi latihan ini, Anda akan fokus pada pengembangan keterampilan menabuh kendang Anda. Kami akan memberikan berbagai latihan yang bervariasi dan menantang untuk membantu Anda mengasah kemampuan bermain kendang.',
                'courses_id' => 8,
            ),
            12 =>
            array (
                'name' => 'Tutorial Rinding Lumajang',
                'slug' => 'tutorial-rinding-lumajang',
                'video' => 'https://youtu.be/sW2vECHmfZI',
                'description' => 'Rinding Lumajang adalah alat musik tradisional berbahan dasar bambu berjenis harpa mulut. Di sebagian wilayah di Indonesia mempunyai nama masing masing',
                'content' => 'Tutorial Rinding Lumajang akan membawa Anda ke dalam dunia alat musik tradisional yang unik ini. Rinding Lumajang, yang juga dikenal dengan nama lain di beberapa wilayah di Indonesia, adalah alat musik berbahan dasar bambu berjenis harpa mulut. Dalam tutorial ini, Anda akan mendapatkan pemahaman mendalam tentang sejarah, cara bermain, dan nilai budaya dari alat musik yang khas ini. Serta, kami akan memandu Anda melalui langkah-langkah untuk memainkan Rinding Lumajang dengan baik dan benar. Selamat menikmati pembelajaran ini!',
                'courses_id' => 6,
            ),
            13 =>
            array (
                'name' => 'Teknik Vocal Robotic Rinding',
                'slug' => 'teknik-vocal-robotic-rinding',
                'video' => 'https://youtu.be/jP7IwSzVuF0',
                'description' => 'Pengenalan teknik vokal robotic dalam permainan Rinding Lumajang untuk menciptakan suara unik dan menarik.',
                'content' => 'Dalam pembelajaran ini, kita akan menjelaskan secara rinci teknik vokal robotic yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar cara menciptakan suara unik dan menarik yang memperkaya pengalaman bermain alat musik ini. Tutorial ini akan membantu Anda memahami prinsip-prinsip dasar teknik vokal robotic dan bagaimana menggabungkannya dengan permainan Rinding Lumajang.',
                'courses_id' => 6,
            ),
            14 =>
            array (
                'name' => 'Teknik Rhythm Beat Perkusi Rinding',
                'slug' => 'teknik-rhythm-beat-perkusi-rinding',
                'video' => 'https://youtu.be/FOSyrDR9wU8',
                'description' => 'Pengenalan teknik bermain ritme dan beat perkusi pada Rinding Lumajang untuk menghasilkan pola suara yang menarik.',
                'content' => 'Dalam tutorial ini, Anda akan diajarkan berbagai teknik bermain ritme dan beat perkusi pada Rinding Lumajang. Anda akan belajar bagaimana menciptakan pola suara yang menarik dan bervariasi untuk menghasilkan musik yang kaya dan dinamis. Kami akan membahas prinsip-prinsip dasar dari teknik ini dan memberikan panduan praktis untuk mengembangkan keterampilan bermain perkusi pada Rinding Lumajang.',
                'courses_id' => 6,
            ),
            15 =>
            array (
                'name' => 'Teknik Tauhid Robotic Style Rinding',
                'slug' => 'teknik-tauhid-robotic-style-rinding',
                'video' => 'https://youtu.be/feclULpBHfA',
                'description' => 'Pengenalan teknik Tauhid Robotic Style dalam permainan Rinding Lumajang untuk menciptakan gaya unik dan ekspresif.',
                'content' => 'Dalam tutorial ini, Anda akan mempelajari secara mendalam teknik Tauhid Robotic Style yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar bagaimana menciptakan gaya bermain yang unik dan ekspresif yang menggabungkan elemen-elemen Tauhid Robotic Style dengan permainan Rinding Lumajang. Kami akan memberikan panduan langkah demi langkah untuk membantu Anda menguasai teknik ini dan menciptakan musik yang unik.',
                'courses_id' => 6,
            ),
            16 =>
            array (
                'name' => 'Teknik dan Style 2 Maestro Rinding',
                'slug' => 'teknik-dan-style-2-maestro-rinding',
                'video' => 'https://youtu.be/lTRAUXZtlyM',
                'description' => 'Pengenalan teknik dan gaya bermain dari dua maestro Rinding Lumajang yang berpengalaman.',
                'content' => 'Dalam tutorial ini, kita akan memperkenalkan Anda pada teknik dan gaya bermain dari dua maestro berpengalaman dalam permainan Rinding Lumajang. Anda akan mendapatkan wawasan yang mendalam tentang berbagai teknik bermain dan gaya musikal yang unik dari maestro-maestro ini. Tutorial ini akan membantu Anda memahami sejarah dan perkembangan Rinding Lumajang serta menggali lebih dalam ke dalam keahlian mereka dalam permainan alat musik ini.',
                'courses_id' => 6,
            ),
            17 =>
            array (
                'name' => 'Style Pak Toyan Rinding Dadapan',
                'slug' => 'style-pak-toyan-rinding-dadapan',
                'video' => 'https://youtu.be/HQJZtibrws4',
                'description' => 'Pengenalan gaya bermain unik dari Pak Toyan dalam permainan Rinding Dadapan.',
                'content' => 'Dalam tutorial ini, kita akan menggali lebih dalam tentang gaya bermain yang unik dari Pak Toyan dalam permainan Rinding Dadapan. Anda akan memahami ciri khas gaya musikalnya, serta bagaimana ia menggabungkan teknik-teknik khusus untuk menciptakan suara yang unik dan memukau. Tutorial ini akan membantu Anda memahami peran penting Pak Toyan dalam melestarikan warisan musik Rinding Dadapan.',
                'courses_id' => 6,
            ),
            18 =>
            array (
                'name' => 'Teknik Vibrasi Rinding',
                'slug' => 'teknik-vibrasi-rinding',
                'video' => 'https://youtu.be/kRqhPodgDj8',
                'description' => 'Pengenalan teknik vibrasi dalam permainan Rinding Lumajang untuk menciptakan efek suara yang khas.',
                'content' => 'Dalam tutorial ini, kita akan membahas teknik vibrasi yang dapat diterapkan dalam permainan Rinding Lumajang. Anda akan belajar cara menciptakan efek suara yang khas dan menarik melalui penggunaan teknik vibrasi pada alat musik ini. Kami akan memberikan panduan langkah demi langkah untuk membantu Anda menguasai teknik ini dan menggunakannya dalam permainan Rinding Lumajang.',
                'courses_id' => 6,
            ),
        ));
    }
}
