<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all()->pluck('id')->toArray();
        $images = Image::all()->pluck('id')->toArray();

        for ($i=0; $i < count($products); $i++) {
            ProductImage::firstOrCreate([
                'product_id' => $products[$i],
                'image_id' => $images[$i],
            ]);
        }
    }
}
