<?php

namespace App\Modules\FeedbackComputer\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\FeedbackComputer\Resources\FeedbackResource;
use App\Modules\FeedbackComputer\DTO\CreateFeedbackComputerDTO;
use App\Modules\FeedbackComputer\DTO\UpdateFeedbackComputerDTO;
use App\Modules\FeedbackComputer\Requests\FeedbackComputerRequest;
use App\Modules\FeedbackComputer\Repository\FeedbackRepositoryReadInterface;
use App\Modules\FeedbackComputer\Repository\FeedbackWriteRepositoryInterface;

class FeedbackComputerController extends BaseApiController
{
    protected $feedbackRepositoryReadInterface;
    protected $feedbackWriteRepositoryInterface;

    public function __construct(FeedbackRepositoryReadInterface $feedbackRepositoryReadInterface, FeedbackWriteRepositoryInterface $feedbackWriteRepositoryInterface)
    {
        $this->feedbackRepositoryReadInterface = $feedbackRepositoryReadInterface;
        $this->feedbackWriteRepositoryInterface = $feedbackWriteRepositoryInterface;
    }

     /**
     * @OA\Get(path="/api/v1/feedbackComputer",
     *   tags={"feedback Computer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of feedback",
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
       $model = $this->feedbackRepositoryReadInterface->getAllFeedback();
        return response()->json(['Feedback' => FeedbackResource::collection($model)]);
    }


      /**
     * @OA\Get(path="/api/v1/feedbackComputer/user/{id}",
     *   tags={"feedback Computer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one feedback by user id",
     *   description="",
     *   operationId="showByUserId",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User id",
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


    public function showByUserId($id){
        $model = $this->feedbackRepositoryReadInterface->getFeedbackByUserId($id);
        if (empty($model)){
            $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        return $this->responseWithData(FeedbackResource::collection($model));
    }


     /**
     * @OA\Get(path="/api/v1/feedbackComputer/{id}",
     *   tags={"feedback Computer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one feedback by  id",
     *   description="",
     *   operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="feedback id",
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
        $model = $this->feedbackRepositoryReadInterface->getFeedbackById($id);
        if (empty($model)){
            $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
       // return $this->responseWithData(FeedbackResource::collection($model));
       return response()->json(['Feedback' => FeedbackResource::collection($model)]);
    }


    /**
     * @OA\Post(
     *   path="/api/v1/feedbackComputer",
     *   tags={"feedback Computer"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new feedback Computer",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="title",
     *                   description="title",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="description",
     *                   description="description",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="user_id",
     *                   description="user_id",
     *                   type="number"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param FeedbackComputerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(FeedbackComputerRequest $request): \Illuminate\Http\JsonResponse
    {

        $model = $this->feedbackWriteRepositoryInterface->create(new CreateFeedbackComputerDTO(
        $request->get('user_id'), $request->get('title_oz'), $request->get('description_oz'),
        $request->get('title_uz'), $request->get('description_uz'),
        $request->get('title_ru'), $request->get('description_ru')
    ));
        if(!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new FeedbackResource($model));

    }




    /**
       * @OA\Put(
       *   path="/api/v1/feedbackComputer/{id}",
       *   tags={"feedback Computer"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a feedback Computer in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *               @OA\Property(
       *                   property="user_id",
       *                   description="user_id",
       *                   type="number"
       *               ),
       *               @OA\Property(
       *                   property="title",
       *                   description="title",
       *                   type="string"
       *               ),
       *               @OA\Property(
       *                   property="description",
       *                   description="description",
       *                   type="string"
       *               ),
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of Feedback that needs to be updated",
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
       * @param FeedbackComputerRequest $request
       * @return \Illuminate\Http\JsonResponse
       */


    public function update( $id, FeedbackComputerRequest $request){
        $model = $this->feedbackWriteRepositoryInterface->update($id, new UpdateFeedbackComputerDTO(
            $request->get('user_id'), $request->get('title'), $request->get('description')));
            if(!$model){
                return $this->responseWithMessage(500);
            }
            return $this->responseWithData(new FeedbackResource($model));
    }




}