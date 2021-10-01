<?php

namespace App\Modules\AskCall\Repository;

use App\Modules\AskCall\DTO\CreateAskCallDTO;
use App\Modules\AskCall\Models\AskCall;

class AskCallWriteRepository implements AskCallWriteRepositoryInterface
{
    public $model;

    public function __construct(AskCall $model)
    {
        $this->model = $model;
    }

    public function storeNumber(CreateAskCallDTO $DTO)
    {
     return  $this->model->create(get_object_vars($DTO));
    }
}