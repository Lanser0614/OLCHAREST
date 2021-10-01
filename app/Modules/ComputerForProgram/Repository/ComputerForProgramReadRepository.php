<?php

namespace App\Modules\ComputerForProgram\Repository;

use App\Modules\ComputerForProgram\Models\ComputerForProgram;

class ComputerForProgramReadRepository implements ComputerForProgramReadRepositoryInterface
{

    protected $model;

    public function __construct(ComputerForProgram $model)
    {
        $this->model = $model;
    }

    public function getProgramByComputerId($id)
    {
        return  $this->model::with('program')->where('computer_id', '=', $id)->get();
    }

    public function getAllProgramWithComputer(){
        return  $this->model::with('program')->get();
    }

}