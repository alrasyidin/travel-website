<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Gallery::create([
            'id' => 1,
            'image' => 'assets/gallery/qAT5QHdzSAucx6JA2HhCO1IUSUoLCEVTGYnHDRCB.jpeg',
            'travel_package_id' => 1
        ]);
        \App\Gallery::create([
            'id' => 2,
            'image' => 'assets/gallery/i4Mf7vtQTlPk9GbJCOy41MqIKp4YGmIttkbLtmdx.jpeg',
            'travel_package_id' => 2
        ]);

        \App\Gallery::create([
            'id' => 3,
            'image' => 'assets/gallery/qAT5QHdzSAucx6JA2HhCO1IUSUoLCEVTGYnHDRCB.jpeg',
            'travel_package_id' => 3
        ]);
    }
}
