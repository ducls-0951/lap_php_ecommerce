<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositories;

class CategoryRepository extends BaseRepositories implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getProduct($id, $data = [])
    {
        try {
            return $this->model->with($data)->findOrFail($id);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getWhereNotNull()
    {
        return $this->model->where('parent_id', '<>', null)->get();
    }
}
