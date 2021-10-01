<?php

namespace App\Modules\EmailFeedback\Models;

use App\Modules\EmailFeedback\database\factories\EmailFeedbackFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailFeedback extends Model
{

    use  HasFactory;

    protected  $table = 'email_feedback';

    protected $fillable = ['email', 'description'];
    

    protected static function newFactory(): EmailFeedbackFactory
    {
        return EmailFeedbackFactory::new();
    }

}