<?php

namespace App\Modules\ProductForComputer\Models;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use App\Modules\OlchaCategories\Models\OlchaCategories;
use App\Modules\OlchaProducts\Models\OlchaProduct;
use App\Modules\ProductForComputer\database\factories\ProductForComputerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProductForComputer extends Model
{
    use HasFactory;

    protected $table = 'product_for_computer';

    protected $fillable = ['cat_id', 'product_id'];

    protected static function newFactory(): ProductForComputerFactory
    {
        return ProductForComputerFactory::new();
    }

    public function product(){
        return $this->hasOne(OlchaProduct::class, 'id', 'product_id');
    }
    public function  category(){
        return $this->hasOne(CategoryForComputer::class, 'category_id', 'cat_id');
    }

    public function cat(){
        return $this->hasOneThrough(CategoryForComputer::class, 'category_id', 'cat_id');
    }

}