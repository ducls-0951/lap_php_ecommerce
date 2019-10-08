<?php

use Illuminate\Database\Seeder;

class ImageTableSeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image' => 'oxford_b.jpg',
            'product_id' => 1
        ]);
        DB::table('images')->insert([
            'image' => 'oxford_br.jpeg',
            'product_id' => 2
        ]);
        DB::table('images')->insert([
            'image' => 'oxford_w.jpg',
            'product_id' => 3
        ]);
        DB::table('images')->insert([
            'image' => 'boots_bl.jpeg',
            'product_id' => 4
        ]);
        DB::table('images')->insert([
            'image' => 'boots_br.jpeg',
            'product_id' => 5
        ]);
        DB::table('images')->insert([
            'image' => 'boots_br1.jpeg',
            'product_id' => 6
        ]);
        DB::table('images')->insert([
            'image' => 'sneaker_bl.jpg',
            'product_id' => 7
        ]);
        DB::table('images')->insert([
            'image' => 'sneaker_r.jpg',
            'product_id' => 8
        ]);
        DB::table('images')->insert([
            'image' => 'sneaker_white.jpg',
            'product_id' => 9
        ]);
        DB::table('images')->insert([
            'image' => 'sandal_bl.jpg',
            'product_id' => 10
        ]);
        DB::table('images')->insert([
            'image' => 'saldal_whi.jpg',
            'product_id' => 11
        ]);
        DB::table('images')->insert([
            'image' => 'saldel_br.jpg',
            'product_id' => 12
        ]);
        DB::table('images')->insert([
            'image' => 'boots_wm_whi',
            'product_id' => 13
        ]);
    }
}
