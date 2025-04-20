<?php
use Illuminate\Http\Request;

class ProjectCategoryUpdateDto
{
    public function __construct(
        public string $title,
        public ?string $image_base64,
        public ?string $image_mime,
        public ?string $description,
        public ?string $summary,
        public ?string $url

    ) {
    }
    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $data['title'] ?? null,
            $data['image_base64'] ?? null,
            $data['image_mime'] ?? null,
            $data['description'] ?? null,
            $data['summary'] ?? null,
            $data['url'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter ([
            'title' => $this->title,
            'image_base64' => $this->image_base64,
            'image_mime' => $this->image_mime,
            'description' => $this->description,
            'summary' => $this->summary,
            'url' => $this->url,
        ], fn($value)=>!is_null($value));
    }
}
