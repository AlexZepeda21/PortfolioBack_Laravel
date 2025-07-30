<?php

namespace App\Services;

use App\Models\ProjectTechnology;
use App\Dtos\ProjectTechnologyDto;


class ProjectTechnologyService
{
    public function store(ProjectTechnologyDto $dto): ProjectTechnology
    {
        return ProjectTechnology::create($dto->toArray());
    }
}

?>