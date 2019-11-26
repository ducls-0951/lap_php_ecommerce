<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositories;

class CategoryRepository extends BaseRepositories implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getChildCategory()
    {
        return $this->model->with('categories')->where('parent_id', '<>', null)->get();
    }
}
