<?php

namespace App\Modules\FeedbackComputer\Models;

use App\Modules\FeedbackComputer\database\factories\FeedbackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_computer';

    protected $fillable = ['title_oz','user_id', 'description_oz','title_uz','description_uz','title_ru','description_ru'];

    protected static function newFactory(): FeedbackFactory
    {
        return FeedbackFactory::new();
    }
}