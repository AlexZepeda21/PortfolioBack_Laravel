<?php
use Illuminate\Http\Request;

class ImageUpdateDto
{
    public function __construct(
        public ?string $title_image,
        public ?string $image_base64,
        public ?string $image_mime,
        public ?int $project_id
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $data['title_image'] ?? null,
            $data['image_base64'] ?? null,
            $data['image_mime'] ?? null,
            $data['project_id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'title_image' => $this->title_image,
            'image_base64' => $this->image_base64,
            'image_mime' => $this->image_mime,
            'project_id' => $this->project_id,
        ], fn ($value) => !is_null($value));
    }
}
