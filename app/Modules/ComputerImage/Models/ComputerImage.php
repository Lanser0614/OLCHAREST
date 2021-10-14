<?php

namespace App\Modules\ComputerImage\Models;

use App\Modules\ComputerImage\database\factories\ComputerImageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerImage extends Model
{
    use HasFactory;
  
    protected $table = 'computer_image';
    protected $fillable = ['computer_id', 'image'];

    protected static function newFactory(): ComputerImageFactory
    {
        return ComputerImageFactory::new();
    }



}
