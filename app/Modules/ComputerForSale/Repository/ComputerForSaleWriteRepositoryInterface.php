<?php

namespace App\Modules\ComputerForSale\Repository;

use App\Modules\ComputerForSale\DTO\CreateComputerSale;
use App\Modules\ComputerForSale\DTO\UpdateComputerSale;

interface ComputerForSaleWriteRepositoryInterface
{
    public function create(CreateComputerSale $DTO);

    public function update($computer_id, $category_id, UpdateComputerSale $DTO);
}
