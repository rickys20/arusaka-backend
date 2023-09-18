<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('goods')->delete();

        DB::table('goods')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Suling Sunda 6 Lubang Seruling Bambu Alat Musik Tradisional Bisa Cod',
                'slug' => 'suling-sunda-6-lubang-seruling-bambu-alat-musik-tradisional-bisa-cod',
                'link' => 'https://shope.ee/10aiCGd0Nf',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/4c1b2c28cd4263e403983c3d7081c9fe',
                'price' => 15000,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Gamelan gender wayang besi',
                'slug' => 'gamelan-gender-wayang-besi',
                'link' => 'https://shope.ee/4AXjxyye0Y',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/b1dc9fce6429bb95cc0e14235c45a20c',
                'price' => 1250000,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Alat Musik Traditional Saron Gamelan 7 Bilah',
                'slug' => 'alat-musik-traditional-saron-gamelan-7-bilah',
                'link' => 'https://shope.ee/3putZE7wrx',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/fd5f371c8ecd2c645a8279a5543e0bc8',
                'price' => 152000,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Angklung 23 & 22 nada bambu tali/standar',
                'slug' => 'angklung-23-22-nada-bambu-talistandar',
                'link' => 'https://shope.ee/7pR0eBXZLw',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/f33cb6b8f65e076b7e093006bf54d78e',
                'price' => 795000,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Angklung bambu tali dan bambu hitam 18 nada / 2,5 oktaf',
                'slug' => 'angklung-bambu-tali-dan-bambu-hitam-18-nada-25-oktaf',
                'link' => 'https://shope.ee/9esepVSHbk',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/9804b1937ec24f2c6a01400004c212ae',
                'price' => 295000,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Angklung 1 Oktaf MINI UNTUK Anak TK atau SD',
                'slug' => 'angklung-1-oktaf-mini-untuk-anak-tk-atau-sd',
                'link' => 'https://shope.ee/40EI4zCCUp',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/01f20da69d9474994eb595be885ddc84',
                'price' => 74900,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'RINDING ALAT MUSIK TRADISIONAL BAMBU KHAS JAWA BARAT BANDUNG',
                'slug' => 'rinding-alat-musik-tradisional-bambu-khas-jawa-barat-bandung',
                'link' => 'https://shope.ee/7pR2NxaIfQ',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/5c992a6354d6d9a29d001a30aa5c4a36',
                'price' => 60000,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Angklung 18 Nada / Angklung Bambu 18 Nada',
                'slug' => 'angklung-18-nada-angklung-bambu-18-nada',
                'link' => 'https://shope.ee/2fiwEKJbSy',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/sg-11134201-22090-38e3o7lesqhvb2',
                'price' => 250000,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'KOLINTANG BAMBU / GAMBANG BAMBU 15 NADA 2 OKTAF',
                'slug' => 'kolintang-bambu-gambang-bambu-15-nada-2-oktaf',
                'link' => 'https://shope.ee/7pR2NlEgFP',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/a9012b961a47e76b13855cc2e0b5afc2',
                'price' => 180000,
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Paket 2 Buku Tuntunan Karawitan I & II jilid 1 & 2 - penyusun Bpk. M. Siswanto',
                'slug' => 'paket-2-buku-tuntunan-karawitan-i-ii-jilid-1-2-penyusun-bpk-m-siswanto',
                'link' => 'https://shope.ee/4pnSGbFuaK',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/e4409e8bba8fb1a8668e08ebcd3831e7',
                'price' => 32000,
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Peta dan Arkeologi Gamelan Nusantara - Gading',
                'slug' => 'peta-dan-arkeologi-gamelan-nusantara-gading',
                'link' => 'https://shope.ee/qHJVDZw06',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/5b343318e562a7278b05283e08ca5044',
                'price' => 50050,
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'GAMELAN SALENDRO gending dan kawih kepesindenan lagu jalan PANDI UPANDI',
                'slug' => 'gamelan-salendro-gending-dan-kawih-kepesindenan-lagu-jalan-pandi-upandi',
                'link' => 'https://shope.ee/B1chvnEPL',
                'description' => NULL,
                'status' => 'ACTIVE',
                'image' => 'https://down-id.img.susercontent.com/file/id-11134207-7qul4-lkj3vmwy009gb7',
                'price' => 35500,
            ),
        ));


    }
}
