<?php

namespace App\Modules\AskCall\Repository;

use App\Modules\AskCall\DTO\CreateAskCallDTO;

interface AskCallWriteRepositoryInterface
{
    public function storeNumber(CreateAskCallDTO $DTO);
}