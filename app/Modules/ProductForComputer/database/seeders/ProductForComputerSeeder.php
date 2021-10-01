<?php

namespace App\Modules\ProductForComputer\database\seeders;

use App\Modules\Categories\Models\Category;
use Illuminate\Database\Seeder;
use App\Modules\ProductForComputer\Models\ProductForComputer;

class ProductForComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        foreach(ProductForComputer::all() as $category){
//            $products =  Category::inRandomOrder()->take(rand(1,10))->pluck('id');
//            $category->category()->attach($products);
//        }

        ProductForComputer::factory(40)->create();

    }
}
