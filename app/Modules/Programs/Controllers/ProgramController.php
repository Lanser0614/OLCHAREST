<?php

namespace App\Modules\Programs\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\Programs\DTO\CreateProgramDTO;
use App\Modules\Programs\DTO\UpdateProgramDTO;
use App\Modules\Programs\Requests\ProgramRequest;
use App\Modules\Programs\Resources\ProgramResource;
use App\Modules\Programs\Repository\ProgramReadRepositoryInterface;
use App\Modules\Programs\Repository\ProgramWriteRepositoryInterface;

class ProgramController extends BaseApiController
{

    protected $programReadRepository;
    protected $programWriteRepositoryInterface;

    public function __construct(ProgramReadRepositoryInterface $programReadRepository, ProgramWriteRepositoryInterface $programWriteRepositoryInterface)
    {
        $this->programReadRepository = $programReadRepository;
        $this->programWriteRepositoryInterface = $programWriteRepositoryInterface;
    }


    /**
     * @OA\Get(path="/api/v1/Programs",
     *   tags={"Programs"},
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


    public function index(){
        $model = $this->programReadRepository->getProgram();
        // return $this->responseWithData(ProgramResource::collection($model));
        return response()->json(['Program' => ProgramResource::collection($model)]);
    }


/**
     * @OA\Get(path="/api/v1/Programs/{id}",
     *   tags={"Programs"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one program by  id",
     *   description="",
     *   operationId="getProgramBytId",
     *     @OA\Parameter(
     *         name="id",
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

    public function getProgramBytId($id){
        $model = $this->programReadRepository->getProgramBytId($id);
        if (empty($model)){
            $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        ///return $this->responseWithData(new ProgramResource($model));
        return response()->json(['Program' => new ProgramResource($model)]);
      
    }


    public function show($id){
        $model = $this->programReadRepository->getByIdProgram($id);
        if(empty($model)){
            $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        return $this->responseWithData(new ProgramResource($model));
    }




    /**
     * @OA\Post(
     *   path="/api/v1/Programs",
     *   tags={"Programs"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new Program",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                     property="name_ru",
       *                   description="name_ru",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="name_uz",
       *                   description="name_uz",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="name_oz",
       *                   description="name_oz",
       *                   type="string"
       *               ),
     *               @OA\Property(
     *                   property="parent_id",
     *                   description="parent_id",
     *                   type="number"
     *               ),
     *              
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ProgramRequest $request
     * @return \Illuminate\Http\JsonResponse
     */



    public function store(ProgramRequest $request){
        $model = $this->programWriteRepositoryInterface->create(new CreateProgramDTO(
            $request->get('name_ru'), $request->get('name_uz'), $request->get('name_oz'), $request->get('image'), $request->get('parent_id')
        ));
        if(!$model){
           return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new ProgramResource($model), Response::HTTP_CREATED);
    }


  /**
       * @OA\Put(
       *   path="/api/v1/Programs/{id}",
       *   tags={"Programs"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a Programs in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *               @OA\Property(
       *                   property="name_ru",
       *                   description="name_ru",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="name_uz",
       *                   description="name_uz",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="name_oz",
       *                   description="name_oz",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="parent_id",
       *                   description="parent_id",
       *                   type="number"
       *               ),
       *               
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of Programs that needs to be updated",
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
       * @param ProgramRequest $request
       * @return \Illuminate\Http\JsonResponse
       */

    public function update($id, ProgramRequest $request){
        $model = $this->programWriteRepositoryInterface->update($id, new UpdateProgramDTO(
            $request->get('name_ru'), $request->get('name_uz'),  $request->get('image'), $request->get('name_oz'), $request->get('parent_id')
        ));
        if(!$model){
           return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new ProgramResource($model), Response::HTTP_CREATED);
    }
}