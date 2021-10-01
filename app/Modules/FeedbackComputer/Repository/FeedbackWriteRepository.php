<?php

namespace App\Modules\FeedbackComputer\Repository;

use App\Modules\FeedbackComputer\DTO\CreateFeedbackComputerDTO;
use App\Modules\FeedbackComputer\DTO\UpdateFeedbackComputerDTO;
use App\Modules\FeedbackComputer\Models\Feedback;

class FeedbackWriteRepository implements FeedbackWriteRepositoryInterface
{
    protected $model;

    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }


    public function create(CreateFeedbackComputerDTO $DTO)
    {
        return $this->model->create(get_object_vars($DTO));
    }

    public function update($id, UpdateFeedbackComputerDTO $DTO)
    {
        $model = $this->model::where('id', '=', $id)->first();
        $model->update(get_object_vars($DTO));
        return $model;
    }

}