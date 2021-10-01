<?php

namespace App\Modules\Programs\Repository;

interface ProgramReadRepositoryInterface
{
    public function getProgram();

    public function getProgramBytId($id);

    public function getByIdProgram($id);

}