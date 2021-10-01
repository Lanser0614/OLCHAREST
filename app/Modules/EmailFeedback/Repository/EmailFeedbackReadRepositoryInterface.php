<?php

namespace App\Modules\EmailFeedback\Repository;

interface EmailFeedbackReadRepositoryInterface
{
        public  function getAllEmailFeedback();

        public  function  getBEmailFeedbackById($id);
}