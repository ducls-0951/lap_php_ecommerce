<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getProduct($id, $data = []);
    public function whereNotNull($data);
}
