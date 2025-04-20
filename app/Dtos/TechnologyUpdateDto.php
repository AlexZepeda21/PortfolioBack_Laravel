<?php

use Illuminate\Http\Request;

class TechnologyUpdateDto
{
    public function __construct(
        public ?string $name_technology,
        public ?string $description,
        public ?string $image_base64,
        public ?string $image_mime
    ){}

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $request->input('name_technology'),
            $request->input('description'),
            $request->input('image_base64'),
            $request->input('image_mime')
        );
    }
}