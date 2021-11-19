<?php

namespace App\Modules\ComputerImage\Repository;

use App\Modules\ComputerImage\DTO\CreateComputerImageDTO;

interface ComputerImageWriteRepositoryInterface
{
     public function create(CreateComputerImageDTO $DTO);
   
}
