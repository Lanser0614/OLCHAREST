<?php

namespace App\Modules\OlchaProducts\Models;

use App\Modules\OlchaCategories\Models\OlchaCategories;
use App\Modules\ProductForComputer\Models\ProductForComputer;
use App\Modules\RelatedProduct\Models\RelatedProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlchaProduct extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    
    public function category(){
        return $this->hasOne(OlchaCategories::class, 'id', 'category_id');
    }

  


}
