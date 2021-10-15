<?php

namespace App\Modules\RelatedProduct\Models;

use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use App\Modules\ProductForComputer\Models\ProductForComputer;
use App\Modules\RelatedProduct\database\factories\ProductForRelatedFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    use HasFactory;

    protected $table = 'product_for_related';

    protected $fillable = ['product_id', 'related_product_id'];
    // public function product(){
    //     return $this->hasMany(ProductForComputer::class,  'product_id','related_product_id');
    // }

    public function product(){
        return $this->hasMany(ProductForComputer::class,  'product_id', 'related_product_id');
    }


    public function mainProduct(){
        return $this->hasOne(ProductForComputer::class, 'product_id', 'related_product_id');
    }


   public function category(){
       return $this->hasOne(CategoryForComputer::class, 'category_id', 'cat_id');
   }
    // public function productId(){
    //     return $this->hasMany(ProductForComputer::class,  'id','product_id');
    // }

    // public function category(){
    //     return $this->hasMany(ProductForComputer::class, 'cat_id', 'cat_id');
    // }

   public function relatedProduct(){
       return $this->hasMany(ProductForComputer::class, 'product_id', 'product_id');
   }



    protected static function newFactory(): ProductForRelatedFactory
    {
        return ProductForRelatedFactory::new();
    }

}