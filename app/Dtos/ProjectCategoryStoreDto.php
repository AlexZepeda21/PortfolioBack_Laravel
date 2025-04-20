<?php
use Illuminate\Http\Request;

class ProjectCategoryStoreDto
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
        return new self(
            $request->input('title'),
            $request->input('image_base64'),
            $request->input('image_mime'),
            $request->input('description'),
            $request->input('summary'),
            $request->input('url')
        );
    }
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'image_base64' => $this->image_base64,
            'image_mime' => $this->image_mime,
            'description' => $this->description,
            'summary' => $this->summary,
            'url' => $this->url,
        ];
    }
}
