<?php

namespace App\Repositories\Size;

use App\Repositories\BaseRepositories;

class SizeRepository extends BaseRepositories implements SizeRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Size::class;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
