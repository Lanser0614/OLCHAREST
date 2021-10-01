<?php

namespace App\Modules\FeedbackComputer\Repository;

use App\Modules\FeedbackComputer\DTO\CreateFeedbackComputerDTO;
use App\Modules\FeedbackComputer\DTO\UpdateFeedbackComputerDTO;

interface FeedbackWriteRepositoryInterface
{
    public function create(CreateFeedbackComputerDTO $DTO);

    public function update($id, UpdateFeedbackComputerDTO $DTO);

}