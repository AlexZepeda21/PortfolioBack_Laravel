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

    ){}
    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $request->input('title'),
            $request->input('image_base64'),
            $request->input('image_mime'),
            $request->input('description'),
            $request->input('summary'),
            $request->input('url')
        );
    }
}
