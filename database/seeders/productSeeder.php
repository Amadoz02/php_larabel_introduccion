<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 50 productos
        $products = Product::factory(50)->create();

        // Por cada producto, crear 2 imágenes asociadas
        foreach ($products as $product) {
            $product->images()->createMany(
                Image::factory(2)->make([
                    'imageable_id' => $product->id,
                    'imageable_type' => Product::class,
                ])->toArray()
            );
        }
    }
}
