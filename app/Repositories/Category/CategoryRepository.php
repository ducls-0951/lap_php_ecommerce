<?php


namespace App\Repositories\Category;


use App\Repositories\BaseRepositories;

class CategoryRepository extends BaseRepositories implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}
