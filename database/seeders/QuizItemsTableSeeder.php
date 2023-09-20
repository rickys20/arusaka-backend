<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('quiz_items')->delete();

        DB::table('quiz_items')->insert(array (
            0 =>
            array (
                'id' => 1,
                'quiz_id' => 1,
                'content' => 'Rinding Lumajang merupakan jenis alat musik yang dimainkan dengan cara...',
                'a' => 'Menggunakan kekuatan kerongkongan dan bantuan lidah mulut',
                'b' => 'Dipetik sesuai dengan senarnya',
                'c' => 'Dipukul dengan tangan berdasarkan posisi bambu yang sesuai',
                'd' => 'Dipukul menggunakan tongkat kecil',
                'solution' => 'a',
                'explanation' => 'Menggunakan kekuatan kerongkongan dan bantuan lidah mulut',
                'created_at' => '2023-09-16 16:46:28',
                'updated_at' => '2023-09-16 16:46:28',
            ),
            1 =>
            array (
                'id' => 2,
                'quiz_id' => 1,
                'content' => 'Teknik vokal rinding dilakukang dengan menyebutkan vokal...',
                'a' => 'A-I-O',
                'b' => 'A-I-U-E-O',
                'c' => 'A-E-I-O',
                'd' => 'A-E-O',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 16:48:30',
                'updated_at' => '2023-09-16 16:48:30',
            ),
            2 =>
            array (
                'id' => 3,
                'quiz_id' => 1,
                'content' => 'Permainan lidah dan kerongkongan yang menghasilkan suara robot dengan kalimat tauhid
disebut?',
                'a' => 'Tauhid style',
                'b' => 'Tauhid robotic style',
                'c' => 'Robotic Style',
                'd' => 'Ultimate Tauhid Style',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 16:49:16',
                'updated_at' => '2023-09-16 16:49:16',
            ),
            3 =>
            array (
                'id' => 4,
                'quiz_id' => 2,
                'content' => 'Berikut ini yang bukan golongan dari instrumen gamelan jawa adalah',
                'a' => 'Balungan',
                'b' => 'Panutup',
                'c' => 'Penyekar',
                'd' => 'Pemangku',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 16:58:17',
                'updated_at' => '2023-09-16 16:58:17',
            ),
            4 =>
            array (
                'id' => 5,
                'quiz_id' => 2,
                'content' => 'Instrumen apa yang menggunakan teknik mitet atau pitetan..',
                'a' => 'Kendang',
                'b' => 'Kempul',
                'c' => 'Bonang',
                'd' => 'Demung',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 16:59:09',
                'updated_at' => '2023-09-16 16:59:09',
            ),
            5 =>
            array (
                'id' => 6,
                'quiz_id' => 3,
                'content' => 'Balungan merupakan instrumen yang memainkan..',
                'a' => 'Melodi dasar',
                'b' => 'Melodi improvisasi',
                'c' => 'Penanda Struktur Komposisi',
                'd' => 'Memimpin Berjalannya Komposisi',
                'solution' => 'a',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:01:03',
                'updated_at' => '2023-09-16 17:01:03',
            ),
            6 =>
            array (
                'id' => 7,
                'quiz_id' => 3,
                'content' => 'Yang bukan merupakan instrumen pemangku adalah...',
                'a' => 'Kempul',
                'b' => 'Gong',
                'c' => 'Bonang',
                'd' => 'Kenthuk & Kempyang',
                'solution' => 'c',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:01:56',
                'updated_at' => '2023-09-16 17:01:56',
            ),
            7 =>
            array (
                'id' => 8,
                'quiz_id' => 3,
                'content' => 'Fungsi dari teknik mitet atau pitetan pada instrumen demung adalah ...',
                'a' => 'Untuk menghentikan suara demung',
                'b' => 'Untuk menghasilkan bunyi demung',
                'c' => 'Untuk menghentikan suara bilah yang ditabuh agar tidak menggema',
                'd' => 'Untuk menyelesaikan permainan gamelan',
                'solution' => 'c',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:03:03',
                'updated_at' => '2023-09-16 17:03:03',
            ),
            8 =>
            array (
                'id' => 9,
                'quiz_id' => 5,
                'content' => 'Terdiri dari berapakah instrumen kendang batangan?',
                'a' => '3',
                'b' => '4',
                'c' => '5',
                'd' => '2',
                'solution' => 'c',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:06:20',
                'updated_at' => '2023-09-16 17:06:20',
            ),
            9 =>
            array (
                'id' => 10,
                'quiz_id' => 5,
                'content' => 'Suara “tung” yang dihasilkan oleh kendang batangan di simbolkan oleh huruf…',
                'a' => 'b',
                'b' => 'p',
                'c' => 'c',
                'd' => 't',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:06:50',
                'updated_at' => '2023-09-16 17:06:50',
            ),
            10 =>
            array (
                'id' => 11,
                'quiz_id' => 4,
                'content' => 'Dua sisi kendang yang terbuat dari kulit yang menjadi sumber bunyi kendang batangan disebut?',
                'a' => 'Muka',
                'b' => 'So',
                'c' => 'Janget',
                'd' => 'Watangan',
                'solution' => 'a',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:07:40',
                'updated_at' => '2023-09-16 17:07:40',
            ),
            11 =>
            array (
                'id' => 12,
                'quiz_id' => 4,
                'content' => 'Suara yang dihasilkan dari memukul muka besar kendang batangan adalah ...',
                'a' => 'Tung',
                'b' => 'Da',
                'c' => 'Bum',
                'd' => 'Tek',
                'solution' => 'b',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:08:18',
                'updated_at' => '2023-09-16 17:08:18',
            ),
            12 =>
            array (
                'id' => 13,
                'quiz_id' => 4,
                'content' => 'Bagaimana pattern kendang malik atau walikan?',
                'a' => 'pbpb pppb bpbp pbpb',
                'b' => 'pppb pppb pppb pbpb',
                'c' => 'bpbp pbpb pppb pbpb',
                'd' => 'bpbp bpbp bpbp bpbp',
                'solution' => 'c',
                'explanation' => 'Silakan baca kembali materi atau langsung bertanya dengan instruktur kami',
                'created_at' => '2023-09-16 17:08:58',
                'updated_at' => '2023-09-16 17:08:58',
            ),
        ));


    }
}
