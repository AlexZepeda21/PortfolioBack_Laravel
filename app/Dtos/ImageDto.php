<?php
use Illuminate\Http\Request;

class ImageDto
{
    public function __construct(
        public string $title_image,
        public string $image_base64,
        public string $image_mime,
        public int $project_id
    ){}

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('title_image'),
            $request->input('image_base64'),
            $request->input('image_mime'),
            $request->input('project_id')
        );
    }
}
