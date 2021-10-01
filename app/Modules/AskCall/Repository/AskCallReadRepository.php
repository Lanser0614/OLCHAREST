<?php

namespace App\Modules\AskCall\Repository;

use App\Modules\AskCall\Models\AskCall;

class AskCallReadRepository implements AskCallReadRepositoryInterFace
{
    protected $model;

    public function __construct(AskCall $model)
    {
        $this->model = $model;
    }

    public function getAskCall()
    {
       return $this->model::all();
    }

    public function getByIdAskCall($id)
    {
        return $this->model::find($id);
    }
}