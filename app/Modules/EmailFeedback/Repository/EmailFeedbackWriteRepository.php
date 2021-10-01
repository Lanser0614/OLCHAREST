<?php

namespace App\Modules\EmailFeedback\Repository;

use App\Modules\EmailFeedback\Models\EmailFeedback;
use App\Modules\EmailFeedback\DTO\CreateEmailFeedbackDTO;

class EmailFeedbackWriteRepository implements EmailFeedbackWriteRepositoryInterface
{
    public $model;

    public function __construct(EmailFeedback $model)
    {
        $this->model = $model;
    }
    public function create(CreateEmailFeedbackDTO $DTO)
    {
        return $this->model->create(get_object_vars($DTO));
    }

}
