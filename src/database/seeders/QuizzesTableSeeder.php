<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('quizzes')->delete();

        DB::table('quizzes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'quiz_name' => 'post-test',
                'slug' => 'post-test',
                'courses_id' => 6,
                'minimum_material' => 0,
                'desc' => NULL,
                'created_at' => '2023-09-16 16:44:05',
                'updated_at' => '2023-09-16 16:44:05',
            ),
            1 =>
            array (
                'id' => 2,
                'quiz_name' => 'pre-test',
                'slug' => 'pre-test',
                'courses_id' => 7,
                'minimum_material' => 0,
                'desc' => NULL,
                'created_at' => '2023-09-16 16:56:31',
                'updated_at' => '2023-09-16 16:56:31',
            ),
            2 =>
            array (
                'id' => 3,
                'quiz_name' => 'post-test-demung',
                'slug' => 'post-test-demung',
                'courses_id' => 7,
                'minimum_material' => 0,
                'desc' => NULL,
                'created_at' => '2023-09-16 16:57:04',
                'updated_at' => '2023-09-16 16:57:04',
            ),
            3 =>
            array (
                'id' => 4,
                'quiz_name' => 'post-test-kendang',
                'slug' => 'post-test-kendang',
                'courses_id' => 8,
                'minimum_material' => 0,
                'desc' => NULL,
                'created_at' => '2023-09-16 17:04:47',
                'updated_at' => '2023-09-16 17:04:47',
            ),
            4 =>
            array (
                'id' => 5,
                'quiz_name' => 'pre-test-kendang',
                'slug' => 'pre-test-kendang',
                'courses_id' => 8,
                'minimum_material' => 0,
                'desc' => NULL,
                'created_at' => '2023-09-16 17:05:04',
                'updated_at' => '2023-09-16 17:05:04',
            ),
        ));


    }
}
