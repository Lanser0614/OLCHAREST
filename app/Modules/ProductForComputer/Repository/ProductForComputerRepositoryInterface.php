<?php

namespace App\Modules\ProductForComputer\Repository;

interface ProductForComputerRepositoryInterface
{

    public  function getProducts();

    public  function  getCat($id);

    public function getById($id);

}