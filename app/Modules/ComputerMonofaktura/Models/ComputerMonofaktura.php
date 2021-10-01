<?php

namespace App\Modules\ComputerMonofaktura\Models;


use App\Modules\ComputerMonofaktura\database\factories\ComputerMonofakturaFactory;
use App\Modules\Computers\Models\Computer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerMonofaktura extends Model
{
    use HasFactory;

    protected $table = 'computer_manufactory';
    protected $fillable = ['name', 'image'];

    // public  function computer(){
    //     return $this->belongsTo(Computer::class, 'computer_id', 'id');
    // }

    protected static function newFactory()
    {
      return  ComputerMonofakturaFactory::new();
    }
}