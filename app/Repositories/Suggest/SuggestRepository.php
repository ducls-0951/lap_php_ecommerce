<?php

namespace App\Repositories\Suggest;

use App\Models\Suggest;
use App\Repositories\BaseRepositories;

class SuggestRepository extends BaseRepositories implements SuggestRepositoryInterface
{
    public function getModel()
    {
        return Suggest::class;
    }
}
