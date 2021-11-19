<?php

namespace App\Modules\computerPeripherals\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BaseApiController;
use App\Modules\computerPeripherals\Resources\computerPeripheralsResource;
use App\Modules\computerPeripherals\Repository\computerPeripheralsReedRepositoryInterface;

class computerPeripheralsController extends BaseApiController
{
    public $computerPeripheralsRead;

    public function __construct(computerPeripheralsReedRepositoryInterface $computerPeripheralsRead)
    {
        $this->computerPeripheralsRead = $computerPeripheralsRead;
    }


     


     public function index()
    {
        $model = $this->computerPeripheralsRead->getcomputerPeripherals();
      // return $model; 
        return computerPeripheralsResource::collection($model);
    }


    public function store(Request $request)
    {
    return $request->all();
    }



    public function show($id)
    {
    $model = $this->computerPeripheralsRead->getcomputerPeripheralsById($id);
    return $model;
    }

    public function edit($id)
    {
    # code...
    }


    public function destroy($id)
    {
    # code...
    }
}
