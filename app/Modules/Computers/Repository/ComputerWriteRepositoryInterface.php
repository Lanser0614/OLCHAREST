<?php
namespace App\Modules\Computers\Repository;

use App\Modules\Computers\DTO\CreateComputer;
use App\Modules\Computers\DTO\UpdateComputer;

interface ComputerWriteRepositoryInterface{

    public function create(CreateComputer $DTO);
    public function update($id, UpdateComputer $DTO);
}