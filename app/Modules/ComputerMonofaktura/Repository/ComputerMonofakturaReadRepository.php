<?php

namespace App\Modules\ComputerMonofaktura\Repository;

use App\Modules\ComputerMonofaktura\Models\ComputerMonofaktura;

class ComputerMonofakturaReadRepository implements ComputerMonofakturaReadRepositoryInterface
{
    protected $model;

    public function __construct(ComputerMonofaktura $model)
    {
        $this->model = $model;
    }

    public function getMonofaktura()
    {
   // return  $this->model::with('computer')->get();
   return  $this->model::all();
    }

    public function getMonofakturaById($id)
    {
        return $this->model::where('id', '=', $id)->with('computer')->get();
    }
}