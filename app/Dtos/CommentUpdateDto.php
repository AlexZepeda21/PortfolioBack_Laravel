<?php

use Illuminate\Http\Request;

class CommentUpdateDto
{
    public function __construct(
        public ?string $comment,
        public ?string $guest_name,
        public ?int $user_id,
        public ?int $project_id
    ){}

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $request->input('comment'),
            $request->input('guest_name'),
            $request->input('user_id'),
            $request->input('project_id')
        );
    }
}
