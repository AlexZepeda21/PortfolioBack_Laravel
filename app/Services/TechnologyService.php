<?php
namespace App\Services;

use App\Models\Technology;
use App\Dtos\TechnologyStoreDto;
use App\Dtos\TechnologyUpdateDto;

class TechnologyService
{
    public function store(TechnologyStoreDto $dto): Technology
    {
        return Technology::create($dto->toArray());
    } 
    public function update(Technology $technology, TechnologyUpdateDto $dto): Technology
    {
        $technology->update($dto->toArray());
        return $technology;
    }
    public function delete(Technology $technology): void
    {
        $technology->delete();
    }
}