<?php

namespace App\Modules\AskCall\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Modules\AskCall\DTO\CreateAskCallDTO;
use App\Modules\AskCall\Repository\AskCallReadRepositoryInterFace;
use App\Modules\AskCall\Repository\AskCallWriteRepositoryInterface;
use App\Modules\AskCall\Requests\AskCallRequest;
use App\Modules\AskCall\Resources\AskCallResource;
use Illuminate\Http\Response;

class AskCallController extends BaseApiController
{

    protected $askCallRepository;
    protected $askCallWriteRepository;

    public function __construct(AskCallReadRepositoryInterFace $askCallRepository, AskCallWriteRepositoryInterface $askCallWriteRepository)
    {
        $this->askCallRepository = $askCallRepository;
        $this->askCallWriteRepository = $askCallWriteRepository;
    }



     /**
     * @OA\Get(path="/api/v1/askCall",
     *   tags={"ask Call"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of ask Call",
     *   description="",
     *   operationId="index",
     *   @OA\Response(
     *     response=200,
     *     description="success",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     */


    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->responseWithData(AskCallResource::collection($this->askCallRepository->getAskCall()));
    }



    /**
     * @OA\Get(path="/api/v1/askCall/{id}",
     *   tags={"ask Call"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one askCall with all atributes",
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
        $model = $this->askCallRepository->getByIdAskCall($id);
        if(empty($model)){
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        return $this->responseWithData(new AskCallResource($model));
    }


    /**
     * @OA\Post(
     *   path="/api/v1/askCall",
     *   tags={"ask Call"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new ask Call",
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
     *                   description="name",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="phone_number",
     *                   description="phone_number",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="from_time",
     *                   description="from_time",
     *                   type="string"
     *               ),
     *              @OA\Property(
     *                   property="to_time",
     *                   description="to_time",
     *                   type="string"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param AskCallRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(AskCallRequest $request): \Illuminate\Http\JsonResponse
    {

        $model = $this->askCallWriteRepository->storeNumber(new CreateAskCallDTO(
           $request->get('name'), $request->get('phone_number'), $request->get('from_time'), $request->get('to_time'))
        );
        if (!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new AskCallResource($model), Response::HTTP_CREATED);
    }
}