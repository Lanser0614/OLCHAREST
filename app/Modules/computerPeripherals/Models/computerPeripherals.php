<?php

namespace App\Modules\computerPeripherals\Models;

use App\Modules\computerPeripherals\database\factories\computerPeripheralsFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\ProductForComputer\Models\ProductForComputer;


class computerPeripherals extends Model
{
    use HasFactory;

    protected $table = 'computer_peripherals';
    protected $fillable = ['product_id', 'image', 'description'];


    public function product(){
        return $this->hasOne(ProductForComputer::class, 'product_id', 'product_id');
    }
   
    protected static function newFactory()
    {
        return computerPeripheralsFactory::new();
    }


    public function childCategories()
    {
        return $this->hasMany(computerPeripherals::class,'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(computerPeripherals::class,'parent_id')->with('childCategories');
    }
    
}
