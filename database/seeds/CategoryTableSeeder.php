<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Giay Nam'
        ]);
        DB::table('categories')->insert([
            'name' => 'Giay Nu'
        ]);
        DB::table('categories')->insert([
            'name' => 'Giay Da',
            'parent_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Giay Sneaker',
            'parent_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Giay Cao Got',
            'parent_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Giay Sneaker',
            'parent_id' => 2,
        ]);
    }
}
