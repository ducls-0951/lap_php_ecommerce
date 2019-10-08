<?php

use Illuminate\Database\Seeder;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            'product_id' => 1,
            'user_id' => 1,
            'rating' => 3
        ]);
        DB::table('rates')->insert([
            'product_id' => 1,
            'user_id' => 2,
            'rating' => 5
        ]);
        DB::table('rates')->insert([
            'product_id' => 1,
            'user_id' => 3,
            'rating' => 4
        ]);
        DB::table('rates')->insert([
            'product_id' => 4,
            'user_id' => 1,
            'rating' => 3
        ]);
        DB::table('rates')->insert([
            'product_id' => 4,
            'user_id' => 2,
            'rating' => 4
        ]);
        DB::table('rates')->insert([
            'product_id' => 4,
            'user_id' => 3,
            'rating' => 5
        ]);
        DB::table('rates')->insert([
            'product_id' => 7,
            'user_id' => 1,
            'rating' => 3
        ]);
        DB::table('rates')->insert([
            'product_id' => 7,
            'user_id' => 2,
            'rating' => 4
        ]);
        DB::table('rates')->insert([
            'product_id' => 7,
            'user_id' => 3,
            'rating' => 5
        ]);
        DB::table('rates')->insert([
            'product_id' => 5,
            'user_id' => 1,
            'rating' => 3
        ]);
        DB::table('rates')->insert([
            'product_id' => 5,
            'user_id' => 2,
            'rating' => 3
        ]);
        DB::table('rates')->insert([
            'product_id' => 5,
            'user_id' => 3,
            'rating' => 3
        ]);
    }
}
