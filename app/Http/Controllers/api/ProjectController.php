<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Dtos\ProjectStoreDto;
use App\Dtos\ProjectUpdateDto;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $projectService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $dto = ProjectStoreDto::fromRequest($request);
        $project = $this->projectService->store( $dto);
        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $dto = $request->toDto();
        $updatedProject = $this->projectService->update($project, $dto);
        
        return response()->json($updatedProject, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
         $this->projectService->delete($project);
         return response()->json(['message' => 'Proyecto eliminado con éxito'], 200);
    }
}
