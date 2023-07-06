<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role' => 'ADMIN',
                'mobile_phone' => NULL,
                'address' => NULL,
                'email' => 'arimakana@naver.kr',
                'password' => '$2y$10$1Jj4MkupUKjkVEgou0AIx./UnVVmHoSpr.CbWfY8oRVzRI92vUOi2',
                'name' => 'arima kana',
                'created_at' => '2023-07-05 11:19:01',
                'updated_at' => '2023-07-05 11:19:01',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'role' => 'USER',
                'mobile_phone' => NULL,
                'address' => NULL,
                'email' => 'ruby@naver.kr',
                'password' => '$2y$10$WyeaSew930OXZduI/BJUgOEyx/rJ5MyLJBVZxRHq5XUtZXxdFO9xy',
                'name' => 'ruby',
                'created_at' => '2023-07-05 13:22:52',
                'updated_at' => '2023-07-05 13:22:52',
                'deleted_at' => NULL,
            ),
        ));


    }
}
