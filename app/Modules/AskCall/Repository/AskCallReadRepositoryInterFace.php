<?php

namespace App\Modules\AskCall\Repository;

interface AskCallReadRepositoryInterFace
{
  public function getAskCall();

  public function getByIdAskCall($id);
}