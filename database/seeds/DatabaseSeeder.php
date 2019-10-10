<?php

use Illuminate\Database\Seeder;
use App\Models\Size;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $sizes;
    private $products;

    public function run()
    {
        $this->call([
            CategoryTableSeeder::class,
            ProductTableSeeder::class,
            RateTableSeeder::class,
            ImageTableSeer::class,
            SizeTableSeeder::class,
        ]);

        $sizes = Size::all();
        $products = Product::all();

        Size::All()->each(function ($sizes) use ($products){
            $sizes->products()->saveMany($products);
        });
    }
}
