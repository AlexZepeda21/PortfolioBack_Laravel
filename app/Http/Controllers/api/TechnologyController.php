<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Dtos\TechnologyStoreDto;
use App\Dtos\TechnologyUpdateDto;
use App\Services\TechnologyService;

class TechnologyController extends Controller
{

    public function __construct(protected TechnologyService $technologyService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return response()->json($technologies, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $dtos = TechnologyStoreDto::fromRequest($request);
        $technology = $this->technologyService->store($dtos);

        return response()->json($technology, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return response()->json($technology);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $dto = $request->toDto();
        $technologyUpdated = $this->technologyService->update($technology,$dto);

        return response()->json($technology, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $this->technologyService->delete($technology);
    }
}
