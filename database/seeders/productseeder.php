<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as faker;

class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=1; $i<=10; $i++){
        $product= new product;
        $product->title=$faker->title;
        $product->description=$faker->description;
        $product->quantity=$faker->quantity;
        $product->price=$faker->price;
        $product->images=$faker->images;
       
        $product->save();
    }
}
}
