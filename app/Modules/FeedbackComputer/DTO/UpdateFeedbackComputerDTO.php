<?php

namespace App\Modules\FeedbackComputer\DTO;

class UpdateFeedbackComputerDTO
{
    public $user_id;
    public $title;
    public $description;

    public function __construct($user_id, $title, $description)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description; 
    }
}
