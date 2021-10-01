<?php

namespace App\Modules\ComputerMonofaktura\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\ComputerMonofaktura\DTO\CreateComputerMonofakturaDTO;
use App\Modules\ComputerMonofaktura\DTO\UpdateComputerMonofakturaDTO;
use App\Modules\ComputerMonofaktura\Requests\ComputerMonofakturaRequest;
use App\Modules\ComputerMonofaktura\Resources\ComputerMonofakturaResource;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaReadRepositoryInterface;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaWriteRepositoryInterface;

class ComputerMonofakturaController extends BaseApiController
{

    public $computerMonofakturaRead;
    public $computerMonofakturaWrite;

    public function __construct(ComputerMonofakturaReadRepositoryInterface $computerMonofakturaRead, ComputerMonofakturaWriteRepositoryInterface $computerMonofakturaWrite)
    {
        $this->computerMonofakturaRead = $computerMonofakturaRead;
        $this->computerMonofakturaWrite = $computerMonofakturaWrite;
    }

     /**
     * @OA\Get(path="/api/v1/computerManufactory",
     *   tags={"Computer Monofaktura"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of computer Manufactory",
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
        return $this->responseWithData(ComputerMonofakturaResource::collection($this->computerMonofakturaRead->getMonofaktura()));
       // return $this->computerMonofakturaRead->getMonofaktura();
    }



     /**
     * @OA\Get(path="/api/v1/computerManufactory/{id}",
     *   tags={"Computer Monofaktura"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get  Computer Monofaktura by id",
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


    public function show($id){
        $model = $this->computerMonofakturaRead->getMonofakturaById($id);
        return $this->responseWithData(ComputerMonofakturaResource::collection($model));
    }



     /**
     * @OA\Post(
     *   path="/api/v1/computerManufactory",
     *   tags={"Computer Monofaktura"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new Monofaktura for computer",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *              
     *               @OA\Property(
     *                   property="name",
     *                   description="name",
     *                   type="string"
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

    public function store(ComputerMonofakturaRequest $request){

       
        $model = $this->computerMonofakturaWrite->create(new CreateComputerMonofakturaDTO(
            $request->get('name'), $request->get('image')
         ));
         if(empty($model)){
             return $this->responseWithMessage(500);
         }
         return $this->responseWithData(new ComputerMonofakturaResource($model), Response::HTTP_CREATED);
    }


     /**
       * @OA\Put(
       *   path="/api/v1/computerManufactory/{id}",
       *   tags={"Computer Monofaktura"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a Computer Monofaktura in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *              
       *               @OA\Property(
       *                   property="name",
       *                   description="name",
       *                   type="string"
       *               ),
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of Computer Monofaktura that needs to be updated",
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


    public function update($id, ComputerMonofakturaRequest $request){
    
        $model = $this->computerMonofakturaWrite->update($id, new UpdateComputerMonofakturaDTO(
           $request->get('name'), $request->get('image')
        ));
        if(empty($model)){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new ComputerMonofakturaResource($model), Response::HTTP_CREATED);
   
    }



}