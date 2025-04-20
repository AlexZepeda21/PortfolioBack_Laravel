<?php

namespace App\Services;

use App\Models\Project;
use App\Dtos\ProjectStoreDto;
use App\Dtos\ProjectUpdateDto;

class ProjectService
{
    public function store(ProjectStoreDto $dto): Project 
    {
        return Project::create($dto->toArray());
    }

    public function update(Project $project, ProjectUpdateDto $dto): Project
    {
        $project -> update($dto->toArray());
        return $project;
    }

    public function delete(Project $project)
    {
        $project->delete();
    }
}
/* 
public function store(ProjectStoreDto $dto): Project
    {
        return Project::create([
            'type_project' => $dto->type_project,
            'title_project' => $dto->title_project,
            'image_base64' => $dto->image_base64,
            'image_mime' => $dto->image_mime,
            'description' => $dto->description,
            'project_category_id' => $dto->project_category_id,
        ]);
    }

    public function update(Project $project, ProjectUpdateDto $dto): Project
    {
        $project->update([
            'type_project' => $dto->type_project,
            'title_project' => $dto->title_project,
            'image_base64' => $dto->image_base64,
            'image_mime' => $dto->image_mime,
            'description' => $dto->description,
            'project_category_id' => $dto->project_category_id,
        ]);

        return $project;
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
*/