<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Minge Adidas Brazuca',
            'price' => 249.99,
            'quantity' => 5,
            'category_id'=> 1,
            'brand_id'=>1,
            'description'=>'Lumea deja știe cu ce minge s-a jucat la CM de fotbal 2014 din Brazilia - BRAZUCA. Această variantă mai ieftină a mingii de fotbal BRAZUCA, este fabricată din materiale de calitate, care asigură moliciune și rezistență mare.'
        ]);
    }
}
