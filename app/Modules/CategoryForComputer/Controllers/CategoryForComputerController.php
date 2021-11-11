<?php

namespace App\Modules\CategoryForComputer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\BaseApiController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Modules\OlchaProducts\Models\OlchaProduct;
use App\Modules\OlchaProducts\Resources\ProductResource;
use App\Modules\CategoryForComputer\Models\CategoryForComputer;
use App\Modules\CategoryForComputer\DTO\CreateCategoryForComputerDTO;
use App\Modules\CategoryForComputer\DTO\UpdateCategoryForComputerDTO;
use App\Modules\CategoryForComputer\Requests\UpdateForComputerRequest;
use App\Modules\CategoryForComputer\Requests\CategoryForComputerRequest;
use App\Modules\CategoryForComputer\Resources\CategoryForComputerResource;
use App\Modules\CategoryForComputer\Resources\CategoryForComputerProductResource;
use App\Modules\CategoryForComputer\Repository\CategoryForComputerRepositoryInterface;
use App\Modules\CategoryForComputer\Repository\CategoryForComputerWriteRepositoryInterface;

//use Illuminate\Support\Facades\Request;

class CategoryForComputerController extends BaseApiController
{
    public $categoryForComputerRead;
    public $categoryForComputerWriteRepository;

    public function __construct(CategoryForComputerRepositoryInterface $categoryForComputerRead, CategoryForComputerWriteRepositoryInterface $categoryForComputerWriteRepository)
    {
        $this->categoryForComputerRead = $categoryForComputerRead;
        $this->categoryForComputerWriteRepository = $categoryForComputerWriteRepository;
    }


     /**
     * @OA\Get(path="/api/v1/components",
     *   tags={"components"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get a list of Category for Computer",
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
         $model = $this->categoryForComputerRead->getCategory();
        return CategoryForComputerResource::collection($model);
      // return $this->responseWithData(CategoryForComputerResource::collection($this->categoryForComputerRead->getCategory()));
    }



    /**
     * @OA\Get(path="/api/v1/components/{id}",
     *   tags={"components"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one Category For Computer with all atributes",
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
        $model = $this->categoryForComputerRead->getByCategoryId($id);
        if(empty($model)){
            return $this->responseWithMessage(Response::HTTP_NOT_FOUND);
        }
        return $this->responseWithData(CategoryForComputerResource::collection($model));
    }



    /**
     * @OA\Get(path="/api/v1/components/{alias}",
     *   tags={"components"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Get one Category For Computer with all atributes By Alias",
     *   description="",
     *   operationId="ByAlias",
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Alias",
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


    public function ByAlias(string $slug, Request $request){
       
        $model = $this->categoryForComputerRead->ByAlias($slug);

        foreach ($model as $key ) {
         
        }
      $category =   DB::table('categories')
    ->where('categories.id',"{$key->category_id}")
    ->select('categories.id','categories.name_ru', 'categories.name_uz', 'categories.name_oz', 'categories.name_ru', 'categories.alias', 'categories.icon',)
    ->get();
    foreach ($category as $category_key ) {
     // dd($key);
    }
                  $perPage = 10;
                  $page = $request->input('page', 1);
                  $total = $model->count();
                  $path = $request->url();
                 $results = $model->skip(($page - 1) * $perPage)->take($perPage);
        
                 return ['Components' => $results, 
                         'Category' => $category_key,
                 'Paginator' =>  [
                     'Total' => $total,
                     'Current page' => $page,
                     'PerPage' => $perPage,
                     'path'  => $path,
                     'last_page' => ceil($total / $perPage)
                       ]
                    ];
    }

    



    public function byAliasProduct($slug, $product_slug){

        $alias = DB::table('category_for_computer')
        ->leftJoin('categories','categories.id','=','category_for_computer.category_id')
        ->select('category_for_computer.category_id','categories.id','categories.alias')->where('categories.alias', 'LIKE', "{$slug}")
        ->get();

        foreach ($alias as  $value) {
      
        }
        $id = $value->id;
        $product = DB::table('products')
        ->Join('product_for_computer',function($join) use($id, $product_slug){
                            $join->on('product_for_computer.product_id','=','products.id')
                                ->where('product_for_computer.cat_id','=',$id);
                        })->where('products.alias', 'LIKE', "{$product_slug}")
        ->select('product_for_computer.product_id','products.id','products.alias')
        ->get();
        foreach ($product as $key) {
               // dd($key);
        }
        $product_id = $key->product_id;
     //   return $this->responseWithData(new CategoryForComputerProductResource($product_id));
        $product_info = OlchaProduct::find($product_id);
        return new ProductResource($product_info);
     
    }

    /**
     * @OA\Post(
     *   path="/api/v1/components",
     *   tags={"components"},
     *   security={
     *     {"bearerAuth": {}}
     *   },
     *   summary="Create new category for components",
     *   description="",
     *   operationId="store",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="category_id",
     *                   description="category id",
     *                   type="integer"
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(response="400",description="Validate error"),
     *   @OA\Response(response="200",description="Success create element"),
     * ) *
     * @param CategoryForComputerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryForComputerRequest $request): \Illuminate\Http\JsonResponse
    {
     
        $model = $this->categoryForComputerWriteRepository
            ->create(new CreateCategoryForComputerDTO(
                    $request->get('category_id'))
            );
        if (!$model) {
            return $this->responseWithMessage(500);
        }
       return $this->responseWithData(new CategoryForComputerResource($model), Response::HTTP_CREATED);

    }




/**
       * @OA\Put(
       *   path="/api/v1/components/{id}",
       *   tags={"components"},
       *   security={
       *     {"bearerAuth": {}}
       *   },
       *   summary="Updates a Category For Computer components in the store with form data",
       *   description="",
       *   operationId="update",
       *   @OA\RequestBody(
       *       required=false,
       *       @OA\MediaType(
       *           mediaType="application/x-www-form-urlencoded",
       *           @OA\Schema(
       *               type="object",
       *               @OA\Property(
       *                   property="category_id",
       *                   description="category",
       *                   type="integer"
       *               ),
       *               
       *           )
       *       )
       *   ),
       *   @OA\Parameter(
       *     name="id",
       *     in="path",
       *     description="ID of Category For Computer that needs to be updated",
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
       * @param CategoryForComputerRequest $request
       * @return \Illuminate\Http\JsonResponse
       */




    public function update($id,CategoryForComputerRequest $request): \Illuminate\Http\JsonResponse
    {       
            $model = $this->categoryForComputerWriteRepository->update($id, new CreateCategoryForComputerDTO(
                  $request->get('category_id'))
            );

            if (!$model) {
                return $this->responseWithMessage(500);
            }
            
            return $this->responseWithData(new CategoryForComputerResource($model), Response::HTTP_CREATED);
   
        }

}