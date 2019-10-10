<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
           'name' => 36
        ]);
        DB::table('sizes')->insert([
           'name' => 37
        ]);
        DB::table('sizes')->insert([
           'name' => 38
        ]);
        DB::table('sizes')->insert([
           'name' => 39
        ]);
        DB::table('sizes')->insert([
           'name' => 40
        ]);
        DB::table('sizes')->insert([
           'name' => 41
        ]);
        DB::table('sizes')->insert([
           'name' => 42
        ]);
    }
}
