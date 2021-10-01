<?php

namespace App\Modules\CategoryForComputer\Models;

use App\Modules\CategoryForComputer\database\factories\CategoryForComputerFactory;
use App\Modules\OlchaCategories\Models\OlchaCategories;
use App\Modules\ProductForComputer\Models\ProductForComputer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryForComputer extends Model
{

    use  HasFactory;

    protected $table = 'category_for_computer';

    protected $fillable = ['category_id'];

    protected static function newFactory()
    {
      return  CategoryForComputerFactory::new();
    }

    public function category(){
        return $this->hasOne(OlchaCategories::class, 'id', 'category_id');
    }

    public function products(){
        return $this->hasMany(ProductForComputer::class, 'cat_id', 'category_id');
    }

}