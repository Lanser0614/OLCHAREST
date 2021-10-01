<?php

namespace App\Modules\ComputerMonofaktura\Repository;

use App\Modules\ComputerMonofaktura\DTO\CreateComputerMonofakturaDTO;
use App\Modules\ComputerMonofaktura\DTO\UpdateComputerMonofakturaDTO;

interface ComputerMonofakturaWriteRepositoryInterface
{

    public function create(CreateComputerMonofakturaDTO $DTO);

    public function update($id, UpdateComputerMonofakturaDTO $DTO);
}
