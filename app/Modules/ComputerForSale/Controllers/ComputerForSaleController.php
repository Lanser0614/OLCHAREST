<?php

namespace App\Modules\ComputerForSale\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\ComputerForSale\DTO\CreateComputerSale;
use App\Modules\ComputerForSale\DTO\UpdateComputerSale;
use App\Modules\ComputerForSale\Resources\ComputerForSale;
use App\Modules\ComputerForSale\Resources\ComputerForSaleAll;
use App\Modules\ComputerForSale\Requests\ComputerForSaleRequest;
use App\Modules\ComputerForSale\Requests\ComputerForSaleUpdateRequest;
use App\Modules\ProductForComputer\Resources\ProductForComputerResource;
use App\Modules\ComputerForSale\Repository\ComputerForSaleRepositoryInterface;
use App\Modules\ComputerForSale\Repository\ComputerForSaleWriteRepositoryInterface;

class ComputerForSaleController extends BaseApiController
{
    public $computerForSaleReed;
    public $computerForSaleWrite;

    public function __construct(ComputerForSaleRepositoryInterface $computerForSaleReed, ComputerForSaleWriteRepositoryInterface $computerForSaleWrite)
    {
        $this->computerForSaleReed = $computerForSaleReed;
        $this->computerForSaleWrite= $computerForSaleWrite;
    }

    /**
     * @OA\Get(path="/api/v1/ComputerForSale",
     *   tags={"Computer For Sale"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of computer product for sale",
     *   description="",
     *   operationId="index",
     *   @OA\Response(
     *     response=200,
     *     description="success",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     */

    public function index(){
        return $this->responseWithData(ComputerForSale::collection($this->computerForSaleReed->ComputerForSale()));

    }



    /**
     * @OA\Get(path="/api/v1/ComputerForSale/{id}",
     *   tags={"Computer For Sale"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get  products by compuetr id",
     *   description="",
     *   operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Computer id",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         ),
     *     ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *   ),
     * )
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($id): \Illuminate\Http\JsonResponse
    {
         $model = $this->computerForSaleReed->ComputerForSaleById($id);
         return $this->responseWithData(ComputerForSale::collection($model));
    }



     /**
     * @OA\Post(
     *   path="/api/v1/ComputerForSale",
     *   tags={"Computer For Sale"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new product for computer",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="computer_id",
     *                   description="computer_id",
     *                   type="integer"
     *               ),
     *               @OA\Property(
     *                   property="product_id",
     *                   description="product_id",
     *                   type="integer"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ComputerForSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(ComputerForSaleRequest $request){

        $model = $this->computerForSaleWrite->create(new CreateComputerSale(
           $request->get('computer_id'), $request->get('product_id'), $request->get('category_id')
        ));
        if(empty($model)){
            return $this->responseWithMessage(500);
        }
       // return $model;
        return $this->responseWithData(new ComputerForSale($model), Response::HTTP_CREATED);
      }
  
  
  
  
       /**
       * @OA\Put(
       *   path="/api/v1/ComputerForSale/{id}",
       *   tags={"Computer For Sale"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a ComputerForSale in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *               @OA\Property(
       *                   property="computer_id",
       *                   description="computer_id",
       *                   type="integer"
       *               ),
       *               @OA\Property(
       *                   property="program_id",
       *                   description="product_id",
       *                   type="integer"
       *               ),
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of ComputerForSale that needs to be updated",
       *     required=true,
       *     @OA\Schema(
       *         type="integer",
       *         format="int64"
       *     )
       *   ),
       *   @OA\Response(response="500",description="Error in server"),
       *   @OA\Response(response="400",description="Validate error"),
       * )
       * @param $id
       * @param ComputerForSaleRequest $request
       * @return \Illuminate\Http\JsonResponse
       */
  
  
      public function update($computer_id, $category_id, ComputerForSaleUpdateRequest $request){
  
          $model = $this->computerForSaleWrite->update($computer_id, $category_id, new UpdateComputerSale(
             $request->get('computer_id'), $request->get('product_id'), $request->get('category_id')
          ));
          if(empty($model)){
              return $this->responseWithMessage(500);
          }
          return $this->responseWithData(new ComputerForSale($model), Response::HTTP_CREATED);
        }

}