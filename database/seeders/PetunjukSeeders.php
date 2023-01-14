<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetunjukSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petunjuks')->insert([
            [
                'name' => 'Jukgar',
            ],
            [
                'name' => 'Juknis',
            ],
            [
                'name' => 'Jukref',
            ],
            [
                'name' => 'Protap',
            ],
        ]);
    }
}
