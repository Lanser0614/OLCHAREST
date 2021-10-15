<?php

namespace App\Modules\RelatedProduct\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\RelatedProduct\DTO\CreateRelatedProductDTO;
use App\Modules\RelatedProduct\DTO\UpdateRelatedProductDTO;
use App\Modules\RelatedProduct\Requests\RelatedProductRequest;
use App\Modules\RelatedProduct\Resources\RelatedProductResource;
use App\Modules\RelatedProduct\Repository\RelatedProductRepositoryInterface;
use App\Modules\RelatedProduct\Repository\RelatedProductWriteRepositoryInterFace;

class RelatedProductController extends BaseApiController
{
    protected $relatedProduct;
    protected $relatedProductWriteRepositoryInterFace;

    public function __construct(RelatedProductRepositoryInterface $relatedProduct, RelatedProductWriteRepositoryInterFace $relatedProductWriteRepositoryInterFace)
    {
        $this->relatedProduct = $relatedProduct;
        $this->relatedProductWriteRepositoryInterFace = $relatedProductWriteRepositoryInterFace;;
    }


      /**
     * @OA\Get(path="/api/v1/RelatedProduct",
     *   tags={"Related Product"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of Related Product",
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
        $model = $this->relatedProduct->getRelatedProduct();
        return $this->responseWithData(RelatedProductResource::collection($model));
    }






/**
     * @OA\Get(path="/api/v1/RelatedProduct/{id}",
     *   tags={"Related Product"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one Related Product by  Product id",
     *   description="",
     *   operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product id",
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

    public function show($id){
        $model = $this->relatedProduct->getRelatedByProductId($id);
      //  return json_decode($model);
     // return $model;
        return $this->responseWithData(RelatedProductResource::collection($model));
    }



       /**
     * @OA\Post(
     *   path="/api/v1/RelatedProduct",
     *   tags={"Related Product"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new Related Product for computer",
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
     *                   property="related_product_id",
     *                   description="related_product_id",
     *                   type="number"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ComputerMonofakturaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function store(RelatedProductRequest $request){
        $model = $this->relatedProductWriteRepositoryInterFace->create(new CreateRelatedProductDTO(
            $request->get('product_id'), $request->get('related_product_id')
        ));
        if(!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new RelatedProductResource($model), Response::HTTP_CREATED);
    }




    /**
       * @OA\Put(
       *   path="/api/v1/RelatedProduct/{id}",
       *   tags={"Related Product"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a Related Product in the store with form data",
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
       *                   property="related_product_id",
       *                   description="related_product_id",
       *                   type="number"
       *               ),
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="Product ID of related product that needs to be updated",
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
       * @param ComputerMonofakturaRequest $request
       * @return \Illuminate\Http\JsonResponse
       */


    public function update($id, RelatedProductRequest $request){
        $model = $this->relatedProductWriteRepositoryInterFace->update($id, new UpdateRelatedProductDTO(
            $request->get('product_id'), $request->get('related_product_id')
        ));
        if(!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new RelatedProductResource($model), Response::HTTP_CREATED);
    }


}