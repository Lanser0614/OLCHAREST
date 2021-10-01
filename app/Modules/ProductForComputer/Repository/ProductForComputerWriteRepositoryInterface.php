<?php

namespace App\Modules\ProductForComputer\Repository;


use App\Modules\ProductForComputer\DTO\CreateProductComputerDTO;
use App\Modules\ProductForComputer\DTO\UpdateProductComputerDTO;

interface ProductForComputerWriteRepositoryInterface
{
    public function create(CreateProductComputerDTO $DTO);

    public function update($id, UpdateProductComputerDTO $DTO);

}
