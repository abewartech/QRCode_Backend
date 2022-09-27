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

        $user2 = User::create([
            'name' => 'Abe',
            'username' => 'abe',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user2->assignRole('user');

        $user3 = User::create([
            'name' => 'Octo',
            'username' => 'octo',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user3->assignRole('user');

        $user4 = User::create([
            'name' => 'Yori',
            'username' => 'yori',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user4->assignRole('user');

        $user5 = User::create([
            'name' => 'Cindy',
            'username' => 'cindy',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user5->assignRole('user');

        $user6 = User::create([
            'name' => 'Hendra',
            'username' => 'hendra',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user6->assignRole('user');

        $user7 = User::create([
            'name' => 'Fahmi',
            'username' => 'fahmi',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user7->assignRole('user');

        $user8 = User::create([
            'name' => 'Bayu',
            'username' => 'bayu',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user8->assignRole('user');

        $user9 = User::create([
            'name' => 'Putra',
            'username' => 'putra',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user9->assignRole('user');

    }
}
