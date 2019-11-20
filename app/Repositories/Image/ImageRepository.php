<?php

namespace App\Repositories\Image;

use App\Repositories\BaseRepositories;

class ImageRepository extends BaseRepositories implements ImageRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Image::class;
    }
}
