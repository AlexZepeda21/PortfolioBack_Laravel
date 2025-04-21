<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Dtos\ImageStoreDto;
use App\Dtos\ImageUpdateDto;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Services\ImageService;


class ImageController extends Controller
{
    public function __construct(protected ImageService $imageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return response()->json($images, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $dto = ImageStoreDto::fromRequest(request: $request);
        $image = $this->imageService->store($dto);
        
        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return response()->json($image, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $dto = $request->toDto();
        $updatedImage = $this->imageService->update($image, $dto);

        return response()->json($updatedImage, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $this->imageService->delete($image);
        return response()->json(['message' => 'Imagen eliminada con éxito'], 200);
    }
}
