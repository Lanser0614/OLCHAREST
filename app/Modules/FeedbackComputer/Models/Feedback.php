<?php

namespace App\Modules\FeedbackComputer\Models;

use App\Modules\FeedbackComputer\database\factories\FeedbackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_computer';

    protected $fillable = ['title','user_id', 'description'];

    protected static function newFactory(): FeedbackFactory
    {
        return FeedbackFactory::new();
    }
}