<?php

namespace App\Modules\ProductForComputer\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\ProductForComputer\DTO\CreateProductComputerDTO;
use App\Modules\ProductForComputer\DTO\UpdateProductComputerDTO;
use App\Modules\ProductForComputer\Resources\ProductForComputer;
use App\Modules\ProductForComputer\Requests\ProductForComputerRequest;
use App\Modules\ProductForComputer\Repository\ProductForComputerRepositoryInterface;
use App\Modules\ProductForComputer\Repository\ProductForComputerWriteRepositoryInterface;


class ProductForComputerController extends BaseApiController
{
    public  $productForComputerRepository;
    public $productForComputerWriteRepositoryInterface;

    public function __construct(ProductForComputerRepositoryInterface $productForComputerRepository, ProductForComputerWriteRepositoryInterface $productForComputerWriteRepositoryInterface)
    {
        $this->productForComputerRepository = $productForComputerRepository;
        $this->productForComputerWriteRepositoryInterface = $productForComputerWriteRepositoryInterface;
    }



    /**
     * @OA\Get(path="/api/v1/ProductForComputer",
     *   tags={"ProductForComputer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of computer Product For Computer",
     *   description="",
     *   operationId="index",
     *   @OA\Response(
     *     response=200,
     *     description="success",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     */


    public  function index(){
      return $this->responseWithData(ProductForComputer::collection($this->productForComputerRepository->getProducts()));
    }



    /**
     * @OA\Get(path="/api/v1/ProductForComputer/category/{id}",
     *   tags={"ProductForComputer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one product by category id",
     *   description="",
     *   operationId="cat",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="category id",
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



    public function cat($id)//: \Illuminate\Http\JsonResponse
    {
        return $this->productForComputerRepository->getCat($id);
    }



      /**
     * @OA\Get(path="/api/v1/ProductForComputer/{id}",
     *   tags={"ProductForComputer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one ProductForComputer with all atributes",
     *   description="",
     *   operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="id",
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
        $model = $this->productForComputerRepository->getById($id);
        if (empty($model)) {
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
      return $this->responseWithData(new ProductForComputer($model));
    }



    /**
     * @OA\Post(
     *   path="/api/v1/ProductForComputer",
     *   tags={"ProductForComputer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new Product For Computer",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="product_id",
     *                   description="product_id",
     *                   type="number"
     *               ),
     *               @OA\Property(
     *                   property="cat_id",
     *                   description="acat_id",
     *                   type="number"
     *               ),
     *              
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ProductForComputerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */



    public function store(ProductForComputerRequest $request){
        $model = $this->productForComputerWriteRepositoryInterface->create(new CreateProductComputerDTO(
            $request->get('product_id'), $request->get('cat_id'), ));
    if(!$model){
        return $this->responseWithMessage(500);
    }
    return $this->responseWithData(new ProductForComputer($model), Response::HTTP_CREATED);
   
    }



    /**
       * @OA\Put(
       *   path="/api/v1/ProductForComputer/{id}",
       *   tags={"ProductForComputer"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a ProductForComputer in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
     *               @OA\Property(
     *                   property="product_id",
     *                   description="product_id",
     *                   type="number"
     *               ),
     *               @OA\Property(
     *                   property="cat_id",
     *                   description="cat_id",
     *                   type="number"
     *               ),
       *             
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of ProductForComputer that needs to be updated",
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
       * @param ProductForComputerRequest $request
       * @return \Illuminate\Http\JsonResponse
       */


    public function update($id, ProductForComputerRequest $request){
        $model = $this->productForComputerWriteRepositoryInterface->update($id, new UpdateProductComputerDTO(
            $request->get('product_id'), $request->get('cat_id'), ));
    if(!$model){
        return $this->responseWithMessage(500);
    }
    return $this->responseWithData(new ProductForComputer($model), Response::HTTP_CREATED);
   
    }

}