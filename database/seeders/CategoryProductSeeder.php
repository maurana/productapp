<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryProduct;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all()->pluck('id')->toArray();
        $products = Product::all()->pluck('id')->toArray();

        for ($i=0; $i < count($products); $i++) {
            CategoryProduct::firstOrCreate([
                'product_id' => $products[$i],
                'category_id' => $categories[$i],
            ]);
        }
    }
}
