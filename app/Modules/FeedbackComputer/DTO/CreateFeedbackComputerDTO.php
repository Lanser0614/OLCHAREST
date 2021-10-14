<?php

namespace App\Modules\FeedbackComputer\DTO;

class CreateFeedbackComputerDTO
{
    public $user_id;
    public $title_oz;
    public $description_oz;
    public $title_uz;
    public $description_uz;
    public $title_ru;
    public $description_ru;

    public function __construct($user_id, $title_oz, $description_oz, $title_uz, $description_uz, $title_ru, $description_ru)
    {
        $this->user_id = $user_id;
        $this->title_oz = $title_oz;
        $this->description_oz = $description_oz;
        $this->title_uz = $title_uz;
        $this->description_uz = $description_uz;
        $this->title_ru = $title_ru;
        $this->description_ru = $description_ru;
    }
}
