<?php

namespace App\Modules\Computers\Repository;

use App\Modules\Computers\Models\Computer;
use http\Env\Request;

class ComputerReedRepository implements ComputerReedRepositoryInterface
{
    protected $model;

    public function __construct(Computer $model)
    {
        $this->model = $model;
    }

    public function getComputers()
    {
      return  $this->model::with(['product.product.product.category', 'program.program',  'ComputerImages'])->paginate();
    }

    public function getComputersById($id)
    {
        return $this->model::with(['product.product.product.category', 'program.program', 'manufactory', 'ComputerImages'])->find($id);
    }


    public function getBySlug(string $slug)
    {
        return $this->model::where('alias', '=', $slug)->with(['product.product.product.category', 'program.program', 'manufactory', 'ComputerImages'])->first();
    }

}