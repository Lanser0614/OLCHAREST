<?php

namespace App\Modules\ComputerImage\Repository;

use App\Modules\ComputerImage\DTO\CreateComputerImageDTO;

class ComputerImageWriteRepository implements ComputerImageWriteRepositoryInterface
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }



    public function create(CreateComputerImageDTO $DTO)
    {
        return $this->model->create(get_object_vars($DTO));
    }
}
