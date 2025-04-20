<?php

use Illuminate\Http\Request;

class TechnologyUpdateDto
{
    public function __construct(
        public ?string $name_technology,
        public ?string $description,
        public ?string $image_base64,
        public ?string $image_mime
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(

            $data['name_technology']?? null,
            $data['description'] ?? null,
            $data['image_base64'] ?? null,
            $data['image_mime'] ?? null
        );
    }
    public function toArray(): array
    {
        return array_filter([
            
                'name_technology' => $this->name_technology,
                'description' => $this->description,
                'image_base64' => $this->image_base64,
                'image_mime' => $this->image_mime,
            
        ], fn($value)=>!is_null($value));
    }
}