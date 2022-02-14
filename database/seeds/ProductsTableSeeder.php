<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config("pasta");

        foreach( $products as $product ) {
            $newProduct = new Product();
            $newProduct->name = $product["titolo"];
            $newProduct->type = $product["tipo"];
            $newProduct->cooking_time = $product["cottura"];
            $newProduct->weight = $product["peso"];
            $newProduct->description = $product["descrizione"];
            $newProduct->image = $product["src"];
            $newProduct->save();
        }
    }
}
