<?php

namespace App\Modules\CategoryForComputer\Repository;

interface CategoryForComputerRepositoryInterface
{
        public function getCategory();

        public function getCategoryAlias(string $slug);

        public function getByCategoryId($id);
}