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


     /**
     * @OA\Get(path="/api/v1/computerPeripherals",
     *   tags={"computerPeripherals"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of Programs with parent",
     *   description="",
     *   operationId="index",
     *   @OA\Response(
     *     response=200,
     *     description="success",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     */


     public function index()
    {
        $model = $this->computerPeripheralsRead->getcomputerPeripherals();
        //return $model; 
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
