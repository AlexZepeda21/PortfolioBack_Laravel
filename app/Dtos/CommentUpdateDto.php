<?php

use Illuminate\Http\Request;

class CommentUpdateDto
{
    public function __construct(
        public ?string $comment,
        public ?string $guest_name,
        public ?int $user_id,
        public ?int $project_id
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $data['comment'] ?? null,
            $data['guest_name'] ?? null,
            $data['user_id'] ?? null,
            $data['project_id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'comment' => $this->comment,
            'guest_name' => $this->guest_name,
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
        ], fn($value) => !is_null($value));
    }
}
