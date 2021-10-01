<?php

namespace App\Modules\OlchaCategories\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Modules\OlchaCategories\Repository\OlchaCategoriesReadRepositoryInterface;
use App\Modules\OlchaCategories\Resource\OlchaCategoriesResource;

class OlchaCategoriesController extends BaseApiController
{
    public $olchaCategoriesReadRepositoryInterface;

    public function __construct(OlchaCategoriesReadRepositoryInterface $olchaCategoriesReadRepositoryInterface)
    {
        $this->olchaCategoriesReadRepositoryInterface = $olchaCategoriesReadRepositoryInterface;
    }

    /**
     * @OA\Get(path="/api/v1/OlchaCategories",
     *   tags={"Olcha Categories"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of Olcha Categories",
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
        return $this->responseWithData(OlchaCategoriesResource::collection($this->olchaCategoriesReadRepositoryInterface->getCategoryWithProduct()));
       
    }
}
