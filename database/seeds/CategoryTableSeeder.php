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
            'name' => 'Women'
        ]);
        DB::table('categories')->insert([
            'name' => 'Men'
        ]);
        DB::table('categories')->insert([
            'name' => 'Sneakers',
            'parent_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Sneakers',
            'parent_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Oxfords',
            'parent_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Boots',
            'parent_id' => 2,
        ]);
        DB::table('categories')->insert([
            'name' => 'Boots',
            'parent_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'Sandals',
            'parent_id' => 1,
        ]);
    }
}
