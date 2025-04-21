<?php

namespace App\Services;

use App\Models\Comment;
use App\Dtos\CommentStoreDto;
use App\Dtos\CommentUpdateDto;

class CommentService
{
    public function store(CommentStoreDto $dto): Comment
    {
        return Comment::create($dto->toArray());
    }
    public function update(Comment $comment, CommentUpdateDto $dto): Comment
    {
        $comment->update($dto->toArray());
        return $comment;
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
    }

}