<?php

namespace App\Modules\Computers\Models;

use App\Modules\ComputerForProgram\Models\ComputerForProgram;
use App\Modules\ComputerForSale\Models\ComputerForSale;
use App\Modules\ComputerMonofaktura\Models\ComputerMonofaktura;
use App\Modules\Computers\database\factories\ComputerFactory;
use App\Modules\ProductForComputer\Models\ProductForComputer;
use App\Modules\Programs\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
use HasFactory;

protected $table = 'computers';

protected $fillable = ['name', 'desc', 'image', 'monofacture_id', 'name_ru', 'name_uz', 'desc_ru', 'desc_uz'];

protected static function newFactory(): ComputerFactory
{
    return ComputerFactory::new();
}

    public function manufactory(){
        return $this->hasOne(ComputerMonofaktura::class, 'id', 'monofacture_id');
    }

    public function product(){
        return $this->hasMany(ComputerForSale::class, 'computer_id', 'id');
    }
    public function program(){
        return $this->hasMany(ComputerForProgram::class, 'computer_id', 'id');
    }


//    public function product(){
//        return $this->hasMany(ProductForComputer::class,  'id','product_id');
//    }

}