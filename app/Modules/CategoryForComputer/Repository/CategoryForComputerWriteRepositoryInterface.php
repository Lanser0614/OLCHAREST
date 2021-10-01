<?php

namespace App\Modules\CategoryForComputer\Repository;

use App\Modules\CategoryForComputer\DTO\CreateCategoryForComputerDTO;
use App\Modules\CategoryForComputer\DTO\UpdateCategoryForComputerDTO;

interface CategoryForComputerWriteRepositoryInterface
{
    public function create(CreateCategoryForComputerDTO $DTO);

    public function update($id, CreateCategoryForComputerDTO $DTO);
}