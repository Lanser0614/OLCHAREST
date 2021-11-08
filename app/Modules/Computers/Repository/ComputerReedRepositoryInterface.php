<?php

namespace App\Modules\Computers\Repository;

use http\Env\Request;

interface ComputerReedRepositoryInterface
{
    public function getComputers();

    public function getComputersById($id);

    public function getBySlug(string $slug);

    public function getBYProgramId($id);
}