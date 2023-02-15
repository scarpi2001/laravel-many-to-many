<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product :: factory() -> count(100) -> make() -> each(function($product) {

            // FK
            $typology = Typology :: inRandomOrder() -> first();
            $product -> typology() -> associate($typology);

            $product -> save();

            //Relazione Many to Many
            $categories = Category :: inRandomOrder() -> limit(5) -> get();
            $product -> categories() -> attach($categories);
        });
    }
}
