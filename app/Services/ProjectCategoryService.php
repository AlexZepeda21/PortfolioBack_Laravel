<?php 
namespace App\Services;

use App\Models\ProjectCategory;
use App\Dtos\ProjectCategoryStoreDto;
use App\Dtos\ProjectCategoryUpdateDto;

class ProjectCategoryService {
    public function store(ProjectCategoryStoreDto $dto): ProjectCategory{
        return ProjectCategory::create($dto->toArray());
    }
    public function update(ProjectCategory $projectCategory, ProjectCategoryUpdateDto $dto): ProjectCategory{
        $projectCategory->update($dto->toArray());
        return $projectCategory;
    }
    public function delete(ProjectCategory $project_category): void{
        $project_category->delete();
    }
}