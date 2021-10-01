<?php

namespace App\Modules\ComputerMonofaktura\Repository;

interface ComputerMonofakturaReadRepositoryInterface
{
    public function getMonofaktura();

    public function getMonofakturaById($id);
}