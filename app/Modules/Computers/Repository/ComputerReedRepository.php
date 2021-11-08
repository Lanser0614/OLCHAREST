<?php

namespace App\Modules\Computers\Repository;

use App\Modules\Computers\Models\Computer;
use http\Env\Request;
use Illuminate\Database\Eloquent\Builder;

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
        return $this->model::with(['product.product.product.category', 'program', 'manufactory', 'ComputerImages'])->find($id);
    }


    public function getBySlug(string $slug)
    {
        return $this->model::where('alias', '=', $slug)->with(['product.product.product.category', 'program.program', 'manufactory', 'ComputerImages'])->first();
    }

    public function getBYProgramId($id)
    {
     return $this->model::whereHas('program', function (Builder $query) use($id)
        {
            $query->where('program_id', '=', $id);
        }
    )->with(['product.product.product.category', 'program.program',  'ComputerImages'])->get();
    }
}