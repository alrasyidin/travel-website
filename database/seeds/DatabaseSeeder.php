<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // factory(App\User::class, 10)->create();
        // DB::table('users')->insert(
        //     [
        //         'name' => 'Hafidh Pradipta Arrasyid',
        //         'username' => 'hafidhuser',
        //         'email' => 'hafidhpradiptaarrasyid@gmail.com',
        //         'password' => bcrypt('rahasia'),
        //     ]
        // );

        $this->call(TravelPackageSeeder::class);
        $this->call(GallerySeeder::class);

    }
}
