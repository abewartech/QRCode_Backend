<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = config('permission.table_names');

        DB::table($config['roles'])->insert(array(
            array(
                'name' => 'superadmin', 'guard_name' => 'web', 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'user', 'guard_name' => 'web', 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ));

        DB::table($config['permissions'])->insert(array(
            // array(
            //     'name' => 'view_protected_document', 'guard_name' => 'web', 'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ),
        ));

        $user1 = User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user1->assignRole('superadmin');

        $user3 = User::create([
            'name' => 'Abe',
            'username' => 'abe',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user3->assignRole('user');

        $user3 = User::create([
            'name' => 'Octo',
            'username' => 'octo',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user3->assignRole('user');

        $user3 = User::create([
            'name' => 'Yori',
            'username' => 'yori',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user3->assignRole('user');

    }
}
