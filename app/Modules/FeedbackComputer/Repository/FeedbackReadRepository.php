<?php

namespace App\Modules\FeedbackComputer\Repository;

use App\Modules\FeedbackComputer\Models\Feedback;

class FeedbackReadRepository implements FeedbackRepositoryReadInterface
{
    protected $model;

    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function getAllFeedback()
    {
     return  $this->model::all();
    }

    public function getFeedbackByUserId($id)
    {
       return $this->model::where('user_id', '=', $id)->get();
    }


    public function getFeedbackById($id)
    {
        return $this->model::where('id', '=', $id)->get();
    }
}