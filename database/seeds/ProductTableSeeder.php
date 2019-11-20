<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Oxford black',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 30,
            'category_id' => 5,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Oxford brown',
            'quantity' => 3,
            'price' => 40,
            'price_sale' => 35,
            'category_id' => 5,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Oxford white',
            'quantity' => 3,
            'price' => 40,
            'price_sale' => 35,
            'category_id' => 5,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Boots black',
            'quantity' => 3,
            'price' => 60,
            'price_sale' => 55,
            'category_id' => 6,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Boots brown',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 40,
            'category_id' => 6,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Boots brown',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 45,
            'category_id' => 6,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sneaker black',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 48,
            'category_id' => 4,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sneaker red',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 48,
            'category_id' => 4,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sneaker white',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 49,
            'category_id' => 4,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sandal black',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 30,
            'category_id' => 8,
            'description' => 'This is a beautifull shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sandal white',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 30,
            'category_id' => 8,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Sandal brown',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 30,
            'category_id' => 8,
            'description' => 'This is a beautiful shoes',
        ]);
        DB::table('products')->insert([
            'name' => 'Boots white',
            'quantity' => 3,
            'price' => 50,
            'price_sale' => 30,
            'category_id' => 7,
            'description' => 'This is a beautiful shoes',
        ]);
    }
}
