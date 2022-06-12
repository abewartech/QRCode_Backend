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
                'name' => 'admin', 'guard_name' => 'web', 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'user', 'guard_name' => 'web', 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
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
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user2->assignRole('admin');

        $user3 = User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user3->assignRole('user');

    }
}
