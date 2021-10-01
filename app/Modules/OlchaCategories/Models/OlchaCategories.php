<?php

namespace App\Modules\OlchaCategories\Models;

use App\Modules\OlchaProducts\Models\OlchaProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlchaCategories extends Model
{

    use HasFactory;

    protected $table = 'categories';

    public function products(){
        return $this->hasMany(OlchaProduct::class, 'category_id', 'id');
    }
}