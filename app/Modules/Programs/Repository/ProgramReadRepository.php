<?php

namespace App\Modules\Programs\Repository;

use App\Modules\Programs\Models\Program;

class ProgramReadRepository implements ProgramReadRepositoryInterface
{
    protected $model;

    public function __construct(Program $model)
    {
        $this->model = $model;
    }

    public function getProgram()
    {
      return $this->model::with('childrenCategories')->whereNull('parent_id')->get();
    }


    public function getProgramBytId($id)
    {
      return  $this->model::where('id', '=', $id)->with('childrenCategories')->first();
    }

    public function getByIdProgram($id){
      return $this->model::where('id', '=', $id)->first();
    }
}