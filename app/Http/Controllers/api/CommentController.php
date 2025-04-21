<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Dtos\CommentStoreDto;
use App\Dtos\CommentUpdateDto;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CommentService;


class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments, 200); //404
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $dto = CommentStoreDto::fromRequest($request);
        $comment = $this->commentService->store($dto);

        return response()->json($comment, 201); //(400 datos invalidos, 422 error de validación)
    }
    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return response()->json($comment, 204); //(404 no encontrado)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $dto = $request->toDto();
        $updatedComment = $this->commentService->update($comment, $dto);

        return response()->json($updatedComment, 200); //(404 no encontrado, 422 validación fallida)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->commentService->delete($comment);

        return response()->json(['message' => 'Comentario eliminado con éxito.'], 200); //(204 no content, 404 not found)
    }
}

/* 

return response()->json(['message' => 'Creado con éxito'], 201); // POST
return response()->json(['message' => 'Actualizado'], 200);      // PUT/PATCH
return response()->json(null, 204);                              // DELETE sin contenido


*/
