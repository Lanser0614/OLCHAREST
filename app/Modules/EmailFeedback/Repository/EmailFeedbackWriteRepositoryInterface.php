<?php

namespace App\Modules\EmailFeedback\Repository;

use App\Modules\EmailFeedback\DTO\CreateEmailFeedbackDTO;

interface EmailFeedbackWriteRepositoryInterface
{
    public  function create(CreateEmailFeedbackDTO $DTO);
}