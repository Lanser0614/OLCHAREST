<?php

namespace App\Modules\EmailFeedback\DTO;

class CreateEmailFeedbackDTO
{
    public $email;
    public $description;

    public function __construct($email, $description)
    {
        $this->email = $email;
        $this->description = $description;
    }

}