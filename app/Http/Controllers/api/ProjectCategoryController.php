<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Services\ProjectCategoryService;
use App\Dtos\ProjectCategoryStoreDto;
use App\Dtos\ProjectCategoryUpdateDto;
use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;

use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function __construct(protected ProjectCategoryService $projectCategoryService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCategory = ProjectCategory::all();
        return response()->json($projectCategory,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectCategoryRequest $request)
    {
        $dto = ProjectCategoryStoreDto::fromRequest($request);
        $projectCategory = $this->projectCategoryService->store($dto);

        return response()->json($projectCategory,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectCategory)
    {
        return response()->json($projectCategory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $dto = $request->toDto();
        $projectCategory = $this->projectCategoryService->update($projectCategory, $dto);

        return response()->json($projectCategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $this->projectCategoryService->delete($projectCategory);
        return response()->json(['message' => 'Categoria de proyecto eliminada con éxito'], 200);
    }
}
