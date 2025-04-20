<?php
namespace App\Services;

use App\Models\Image;
use App\Dtos\ImageStoreDto;
use App\Dtos\ImageUpdateDto;

class ImageService
{

    public function store(ImageStoreDto $dto): Image
    {
        return Image::create($dto->toArray());
    }

    public function update(Image $image, ImageStoreDto $dto): Image
    {
        $image-> update($dto->toArray());
        return $image;
    }

    public function delete(Image $image): void
    {
        $image->delete();
    }
}