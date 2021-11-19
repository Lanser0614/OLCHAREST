<?php

namespace App\Modules\ComputerImage\Controllers;


use App\Http\Controllers\BaseApiController;
use App\Modules\ComputerImage\DTO\CreateComputerImageDTO;
use App\Modules\ComputerImage\Models\ComputerImage;
//use App\Modules\ComputerImage\Repository\ComputerImageWriteRepositoryInterface;
use App\Modules\ComputerImage\Requests\ComputerImageRequest;
use App\Modules\ComputerImage\Resource\ComputerImageResource;
use App\Modules\ComputerImage\Repository\ComputerImageWriteRepositoryInterface;
use Illuminate\Http\Request;

class ComputerImageController extends BaseApiController
{
    public $ComputerImageWrite;

    public function __construct(ComputerImageWriteRepositoryInterface $ComputerImageWrite)
    {
        $this->ComputerImageWrite = $ComputerImageWrite;
    }

    public function index()
    {
        return 'OK';
    }


    public function show($id)
    {
    
    }


    public function update()
    {

    }


    /**
     * @OA\Post(
     *   path="/api/v1/computer_image",
     *   tags={"computer image"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new image for computer",
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
     *                   property="image",
     *                   description="image",
     *                   type="string"
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


    public function store(ComputerImageRequest $request): \Illuminate\Http\JsonResponse
    {
    $model = $this->ComputerImageWrite->create(new CreateComputerImageDTO(
        $request->get('computer_id'), $request->get('image')
    ));
    return  $model;
    // $image = new ComputerImage();
    // $image->computer_id = $request->computer_id;
    // $image->image=$request->image;

    // $image->save();
    // return $image;
       
    }


    public function destroy($id)
    {
    
    }
}
