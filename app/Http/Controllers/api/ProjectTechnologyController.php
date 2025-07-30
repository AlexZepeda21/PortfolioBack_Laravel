<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;

use App\Dtos\ProjectTechnologyDto;
use App\Http\Requests\StoreProjectTechnologyRequest;
use App\Http\Resources\ProjectTechnologyResource;
use App\Models\ProjectTechnology;
use App\Services\ProjectTechnologyService;


class ProjectTechnologyController extends Controller
{
    public function __construct(
        protected ProjectTechnologyService $service
    ) {
    }

    public function store(StoreProjectTechnologyRequest $request)
    {
        $dto = ProjectTechnologyDto::fromRequest($request);
        $projectTechnology = $this->service->store($dto);

        return new ProjectTechnologyResource($projectTechnology);
    }

    public function index(){
        $projectTechnologies = ProjectTechnology::all();
        return ProjectTechnologyResource::collection($projectTechnologies);
    }
}
