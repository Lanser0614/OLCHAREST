<?php

namespace App\Modules\ComputerForSale\Models;

use App\Modules\ComputerForSale\database\factories\ComputerForSaleFactory;
use App\Modules\Computers\Models\Computer;
use App\Modules\OlchaProducts\Models\OlchaProduct;
use App\Modules\ProductForComputer\Models\ProductForComputer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerForSale extends Model
{
    use HasFactory;

    protected $table = 'computer_for_sale';

    protected $fillable = ['product_id', 'computer_id', 'category_id'];



    public function product(){
        return $this->hasOne(ProductForComputer::class,  'product_id','product_id');
    }


    public function computer(){
        return $this->hasOne(Computer::class, 'id', 'computer_id');
    }

    protected static function newFactory()
    {
        return ComputerForSaleFactory::new();
    }

}