<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BidangPetunjukTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bidang_petunjuk')->delete();
        
        \DB::table('bidang_petunjuk')->insert(array (
            0 => 
            array (
                'bidang_id' => 2,
                'created_at' => NULL,
                'id' => 1,
                'petunjuk_id' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'bidang_id' => 2,
                'created_at' => NULL,
                'id' => 2,
                'petunjuk_id' => 2,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'bidang_id' => 2,
                'created_at' => NULL,
                'id' => 3,
                'petunjuk_id' => 3,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'bidang_id' => 2,
                'created_at' => NULL,
                'id' => 4,
                'petunjuk_id' => 4,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'bidang_id' => 1,
                'created_at' => NULL,
                'id' => 5,
                'petunjuk_id' => 1,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'bidang_id' => 1,
                'created_at' => NULL,
                'id' => 6,
                'petunjuk_id' => 2,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'bidang_id' => 1,
                'created_at' => NULL,
                'id' => 7,
                'petunjuk_id' => 3,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'bidang_id' => 1,
                'created_at' => NULL,
                'id' => 8,
                'petunjuk_id' => 4,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}