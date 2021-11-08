<?php

namespace App\Modules\computers\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BaseApiController;
use App\Modules\Computers\DTO\CreateComputer;
use App\Modules\Computers\DTO\UpdateComputer;
use App\Modules\Computers\Models\Computer;
use App\Modules\Computers\Requests\ComputerRequest;
use App\Modules\Computers\Resources\ComputerResource;
use App\Modules\Computers\Resources\ComputerResourceAll;
use App\Modules\Computers\Repository\ComputerReedRepositoryInterface;
use App\Modules\Computers\Repository\ComputerWriteRepositoryInterface;


class ComputerController extends BaseApiController
{
    public  $computerReedRepository;
    public  $computerWriteRepository;

    public function __construct(ComputerReedRepositoryInterface $computerReedRepository,
    ComputerWriteRepositoryInterface $computerWriteRepository)
    {
        $this->computerReedRepository = $computerReedRepository;
        $this->computerWriteRepository = $computerWriteRepository;
    }


    /**
     * @OA\Get(path="/api/v1/computers",
     *   tags={"computers"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of computers",
     *   description="",
     *   operationId="index",
     *   @OA\Response(
     *     response=200,
     *     description="success",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     */


    public function index()//: \Illuminate\Http\JsonResponse
    {

        $model = $this->computerReedRepository->getcomputers();
       // return $model;
     //  return response()->json(['computers' => ComputerResourceAll::collection($model)]);
    return ComputerResourceAll::collection($model);
    }
    /**
     * @OA\Get(path="/api/v1/computers/{id}",
     *   tags={"computers"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one computers with all atributes",
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
        $model = $this->computerReedRepository->getcomputersById($id);
        if (empty($model)) {
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
      //return $this->responseWithData(new ComputerResource($model));
      return response()->json(['computers' => new ComputerResourceAll($model)]);
    }




     /**
     * @OA\Get(path="/api/v1/computers/{slug}",
     *   tags={"computers"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one computers by alias",
     *   description="",
     *   operationId="slug",
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Computer Alias",
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


    public function slug(string $slug){
      
      // return response()->json($model->product);

       //var_dump($model);
      // return $model;
           $model = $this->computerReedRepository->getBySlug($slug);
        if(empty($model)){
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
       return response()->json(['computers' => new ComputerResourceAll($model)]);
    }




/**
     * @OA\Post(
     *   path="/api/v1/computers",
     *   tags={"computers"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new computers",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="name book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="desc",
     *                   description="about book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="name_ru",
     *                   description="name book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="desc_ru",
     *                   description="about book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="name_uz",
     *                   description="name book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="desc_uz",
     *                   description="about book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="image",
     *                   description="about image",
     *                   type="string"
     *               ),
     *              @OA\Property(
     *                   property="monofacture_id",
     *                   description="monofacture id",
     *                   type="number"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ComputerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(ComputerRequest $request){
        $model = $this->computerWriteRepository->create(new CreateComputer(
            $request->get('name'), $request->get('desc'), $request->get('image'),
            $request->get('name_ru'), $request->get('desc_ru'), 
            $request->get('name_uz'), $request->get('desc_uz'),
            $request->get('monofacture_id')
        ));
    if(!$model){
        return $this->responseWithMessage(500);
    }
    return $this->responseWithData(new ComputerResource($model), Response::HTTP_CREATED);
   
}


/**
       * @OA\Put(
       *   path="/api/v1/computers/{id}",
       *   tags={"computers"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a computers in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *               @OA\Property(
       *                   property="name",
       *                   description="name",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="desc",
       *                   description="desc",
       *                   type="string"
       *               ),
       *                 @OA\Property(
     *                   property="name_ru",
     *                   description="name book",
     *                   type="string"
     *               ),
     *                   @OA\Property(
     *                   property="desc_ru",
     *                   description="about book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="name_uz",
     *                   description="name book",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="desc_uz",
     *                   description="about book",
     *                   type="string"
     *               ),
       *               @OA\Property(
       *                   property="image",
       *                   description="image",
       *                   type="string"
       *               ),
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of Computer that needs to be updated",
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
       * @param ComputerRequest $request
       * @return \Illuminate\Http\JsonResponse
       */
  

    public function update($id,ComputerRequest $request){
        $model = $this->computerWriteRepository->update($id, new UpdateComputer(
            $request->get('name'), $request->get('desc'), $request->get('image'),
            $request->get('name_ru'), $request->get('desc_ru'), 
            $request->get('name_uz'), $request->get('desc_uz'),
            $request->get('monofacture_id')
    ));
        if(!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new ComputerResource($model), Response::HTTP_CREATED);
       
    }




    public function getByProgramId($program_id): \Illuminate\Http\JsonResponse
    {
        $model = $this->computerReedRepository->getBYProgramId($program_id);
       // return $model;
        return response()->json(['computers' =>  ComputerResourceAll::collection($model)]);
    }

    /**
     * @OA\Get(path="/api/v1/computers/getComputerByProgramId/{program_id}",
     *   tags={"computers"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one computers with all atributes",
     *   description="",
     *   operationId="getByProgramId",
     *     @OA\Parameter(
     *         name="program_id",
     *         in="path",
     *         description="Program id",
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
}