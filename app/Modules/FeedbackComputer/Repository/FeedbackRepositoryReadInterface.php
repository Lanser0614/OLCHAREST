<?php

namespace App\Modules\FeedbackComputer\Repository;

interface FeedbackRepositoryReadInterface
{
    public function getAllFeedback();

    public function getFeedbackByUserId($id);

    public function getFeedbackById($id);
}