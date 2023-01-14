<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidangs')->insert([
            [
                'name' => 'Operasi',
            ],
            [
                'name' => 'Intelejen',
            ],
        ]);
    }
}
