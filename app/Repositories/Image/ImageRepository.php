<?php

namespace App\Repositories\Image;

use App\Models\Suggest;
use App\Repositories\BaseRepositories;

class ImageRepository extends BaseRepositories implements  ImageRepositoryInterface
{
    public function getModel()
    {
        return Suggest::class;
    }

    public function uploadImage($image, $path)
    {
        $imageName = time() . $image->getClientOriginalName();
        $imageType = $image->getClientOriginalExtension();

        if (in_array($imageType, config('image.image_type'))) {
            $image->move(storage_path($path), $imageName);
        }

        return $imageName;
    }
}
