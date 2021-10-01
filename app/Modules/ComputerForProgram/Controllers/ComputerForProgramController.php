<?php

namespace App\Modules\ComputerForProgram\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\ComputerForProgram\DTO\CreateComputerProgramDTO;
use App\Modules\ComputerForProgram\DTO\UpdateComputerProgramDTO;
use App\Modules\ComputerForProgram\Resources\ComputerProgramResource;
use App\Modules\ComputerForProgram\Requests\ComputerForProgramRequest;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramReadRepositoryInterface;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramWriteRepositoryInterface;

class ComputerForProgramController extends BaseApiController
{
    protected $computerForProgram;
    protected $computerForProgramWriteRepository;

    public function __construct(ComputerForProgramReadRepositoryInterface $computerForProgram, ComputerForProgramWriteRepositoryInterface $computerForProgramWriteRepository)
    {
        $this->computerForProgram = $computerForProgram;
        $this->computerForProgramWriteRepository = $computerForProgramWriteRepository;
    }

    /**
     * @OA\Get(path="/api/v1/ComputerForProgram",
     *   tags={"ComputerForProgram"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of Computer For Program",
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
        return $this->responseWithData(ComputerProgramResource::collection($this->computerForProgram->getAllProgramWithComputer()));
       
    }


     /**
     * @OA\Get(path="/api/v1/ComputerForProgram/{id}",
     *   tags={"ComputerForProgram"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one program by computer id",
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
        $model = $this->computerForProgram->getProgramByComputerId($id);
        if (empty($model)) {
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        //return $model;
        return $this->responseWithData(ComputerProgramResource::collection($model));
    }

  /**
     * @OA\Post(
     *   path="/api/v1/ComputerForProgram",
     *   tags={"ComputerForProgram"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new prgram for computer",
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
     *                   type="number"
     *               ),
     *               @OA\Property(
     *                   property="program_id",
     *                   description="program_id",
     *                   type="number"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param ComputerForProgramRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(ComputerForProgramRequest $request){

      $model = $this->computerForProgramWriteRepository->create(new CreateComputerProgramDTO(
         $request->get('computer_id'), $request->get('program_id')
      ));
      if(empty($model)){
          return $this->responseWithMessage(500);
      }
      return $this->responseWithData(new ComputerProgramResource($model), Response::HTTP_CREATED);
    }




     /**
     * @OA\Put(
     *   path="/api/v1/ComputerForProgram/{id}",
     *   tags={"ComputerForProgram"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Updates a ComputerForProgram in the store with form data",
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
     *                   type="number"
     *               ),
     *               @OA\Property(
     *                   property="program_id",
     *                   description="program_id",
     *                   type="number"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID of ComputerForProgram that needs to be updated",
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
     * @param ComputerForProgramRequest $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function update($id, ComputerForProgramRequest $request){

        $model = $this->computerForProgramWriteRepository->update($id, new UpdateComputerProgramDTO(
           $request->get('computer_id'), $request->get('program_id')
        ));
        if(empty($model)){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new ComputerProgramResource($model), Response::HTTP_CREATED);
      }

      



}