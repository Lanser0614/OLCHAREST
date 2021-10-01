<?php

namespace App\Modules\AskCall\Models;

use App\Modules\AskCall\database\factories\AskCallFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskCall extends Model
{

    use HasFactory;

    protected $table = 'ask_call_table';
    protected $fillable = [
        'name',
        'phone_number',
        'from_time',
        'to_time'
    ];
        protected static function newFactory(): AskCallFactory
        {
            return AskCallFactory::new();
        }
}