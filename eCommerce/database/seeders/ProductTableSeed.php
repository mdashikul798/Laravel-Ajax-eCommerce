<?php

namespace Database\Seeders;

use App\Models\Dashboard\Product;
use Illuminate\Database\Seeder;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'product_name' => 'Lorem ipsum text',
            'price' => '20000',
            'img_url' => 'demo(1).jpg',
            'category_id' => '1',
            'sub_title' => "Summer Kid's fashion",
            'sub_category_id' => '1',
            'brand_id' => '1',
            'tag' => 'Offer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ]);
        $product->save();

        $product = new Product([
            'product_name' => 'Lorem ipsum text',
            'price' => '35000',
            'img_url' => 'demo(2).jpg',
            'category_id' => '1',
            'sub_title' => "Summer men’s fashion",
            'sub_category_id' => '1',
            'brand_id' => '1',
            'tag' => 'Offer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ]);
        $product->save();

        $product = new Product([
            'product_name' => 'Lorem ipsum text',
            'price' => '15000',
            'img_url' => 'demo(3).jpg',
            'category_id' => '2',
            'sub_title' => "Summer women’s fashion",
            'sub_category_id' => '2',
            'brand_id' => '2',
            'tag' => 'Sell',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ]);
        $product->save();

        $product = new Product([
            'product_name' => 'Lorem ipsum text',
            'price' => '10000',
            'img_url' => 'demo(4).jpg',
            'category_id' => '3',
            'sub_title' => "Summer men’s fashion",
            'sub_category_id' => '3',
            'brand_id' => '3',
            'tag' => 'New',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ]);
        $product->save();

        $product = new Product([
            'product_name' => 'Lorem ipsum text',
            'price' => '25000',
            'img_url' => 'demo(5).jpg',
            'category_id' => '2',
            'sub_title' => "Summer kid's fashion",
            'sub_category_id' => '2',
            'brand_id' => '2',
            'tag' => 'Offer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ]);
        $product->save();
    }
}
