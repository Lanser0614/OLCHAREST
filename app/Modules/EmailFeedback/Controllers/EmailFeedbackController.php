<?php

namespace App\Modules\EmailFeedback\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\BaseApiController;
use App\Modules\EmailFeedback\DTO\CreateEmailFeedbackDTO;
use App\Modules\EmailFeedback\Requests\EmailFeedbackRequest;
use App\Modules\EmailFeedback\Resources\EmailFeedbackResource;
use App\Modules\EmailFeedback\Repository\EmailFeedbackReadRepositoryInterface;
use App\Modules\EmailFeedback\Repository\EmailFeedbackWriteRepositoryInterface;
use App\Modules\FeedbackComputer\Resources\FeedbackResource;

class EmailFeedbackController extends BaseApiController
{

    public $emailFeedbackRead;
    public $emailFeedbackWrite;

    public function __construct(EmailFeedbackReadRepositoryInterface $emailFeedbackRead, EmailFeedbackWriteRepositoryInterface $emailFeedbackWrite)
    {
        $this->emailFeedbackRead = $emailFeedbackRead;
        $this->emailFeedbackWrite = $emailFeedbackWrite;
    }



      /**
     * @OA\Get(path="/api/v1/email_feedback",
     *   tags={"email_feedback"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of email_feedback",
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
        return $this->responseWithData(EmailFeedbackResource::collection($this->emailFeedbackRead->getAllEmailFeedback()));
       // return $this->emailFeedbackRead->getAllEmailFeedback();
    }




     /**
     * @OA\Get(path="/api/v1/email_feedback/{id}",
     *   tags={"email_feedback"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one email_feedback with all atributes",
     *   description="",
     *   operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="email_feedback id",
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



    public  function show($id){
        $model = $this->emailFeedbackRead->getBEmailFeedbackById($id);
        if (empty($model)){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(EmailFeedbackResource::collection($model));
        //return $model;
    }



    /**
     * @OA\Post(
     *   path="/api/v1/email_feedback",
     *   tags={"email_feedback"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new email_feedback",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="email",
     *                   description="email",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="description",
     *                   description="description",
     *                   type="string"
     *               ),
     *              
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param EmailFeedbackRequest $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function store(EmailFeedbackRequest $request): \Illuminate\Http\JsonResponse
    {
        $model = $this->emailFeedbackWrite->create(new CreateEmailFeedbackDTO(
           $request->get('email'), $request->get('description'))
        );
        if (!$model){
            return $this->responseWithMessage(500);
        }
        return $this->responseWithData(new EmailFeedbackResource($model), Response::HTTP_CREATED);
    }






    




}