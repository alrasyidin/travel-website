<?php

use Illuminate\Database\Seeder;
use App\TravelPackage;


class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TravelPackage::create([
            'id' => 1,
            'title' => 'Nusa Penida 3D',
            'slug' => 'nusa-penida-3d',
            'location' => 'Republic Indonesia Raya',
            'featured_event' => '',
            'about' => '',
            'type' => 'Open Trip',
            'departure_date' => now(),
            'language' => 'indonesian',
            'foods' => '',
            'duration' => '3D 2N',
            'price' => 1500000,
        ]);

        TravelPackage::create([
            'id' => 2,
            'title' => 'Paket Tangkuban Perahu',
            'slug' => 'paket-tangkuban-perahu',
            'location' => 'Republic Indonesia Raya',
            'featured_event' => '',
            'about' => '',
            'type' => 'Open Trip',
            'departure_date' => now(),
            'language' => 'indonesian',
            'foods' => '',
            'duration' => '3D 2N',
            'price' => 1000000,
        ]);

        TravelPackage::create([
            'id' => 3,
            'title' => 'Paket Liburan Deretan Bali',
            'slug' => 'paket-liburan-deretan-bali',
            'location' => 'Republic Indonesia Raya',
            'featured_event' => '',
            'about' => '',
            'type' => 'Open Trip',
            'departure_date' => now(),
            'language' => 'indonesian',
            'foods' => '',
            'duration' => '3D 2N',
            'price' => 5000000,
        ]);
    }
}
