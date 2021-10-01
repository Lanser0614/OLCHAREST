<?php

namespace App\Modules\EmailFeedback\Repository;

use App\Modules\EmailFeedback\Models\EmailFeedback;

class EmailFeedbackReadRepository implements EmailFeedbackReadRepositoryInterface
{
    protected $model;

    public function __construct(EmailFeedback $model)
    {
        $this->model = $model;
    }

    public function getAllEmailFeedback()
    {
        return $this->model::all();
    }

    public function getBEmailFeedbackById($id)
    {
        return $this->model::query()->where('id', '=', $id)->get();
    }
}