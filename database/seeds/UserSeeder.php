<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Hafidh Pradipta Arrasyid',
                'username' => 'hamstergeek',
                'email' => 'hamstergeek38@gmail.com',
                'password' => bcrypt('rahasia'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'Ujang Sembako',
                'username' => 'ujangsembako',
                'email' => 'ujangsembako@gmail.com',
                'password' => bcrypt('rahasia'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'Kerang Ajaib',
                'username' => 'kerangajaib',
                'email' => 'kerangajaib@gmail.com',
                'password' => bcrypt('rahasia'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
