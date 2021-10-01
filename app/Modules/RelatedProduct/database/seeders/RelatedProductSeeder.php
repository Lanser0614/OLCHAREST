<?php

namespace App\Modules\RelatedProduct\database\seeders;

use App\Modules\RelatedProduct\Models\RelatedProduct;
use Illuminate\Database\Seeder;

class RelatedProductSeeder extends Seeder
{
    public function run()
    {
        RelatedProduct::factory(10)->create();
    }
}