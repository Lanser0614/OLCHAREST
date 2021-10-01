<?php

namespace App\Modules\CategoryForComputer\Repository;

interface CategoryForComputerRepositoryInterface
{
        public function getCategory();

        public function getByCategoryId($id);
}