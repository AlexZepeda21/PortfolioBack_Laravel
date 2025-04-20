<?php
use Illuminate\Http\Request;

class ProjectUpdateDto
{
    public function __construct(
        public ?string $type_project,
        public ?string $title_project,
        public ?string $development_start_date,
        public ?string $development_end_date,
        public ?string $image_base64,
        public ?string $image_mime,
        public ?string $url_github,
        public ?string $url_site,
        public ?string $url_download,
        public ?string $description,
        public ?int $project_category_id
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $data['type_project'] ?? null,
            $data['title_project'] ?? null,
            $data['development_start_date'] ?? null,
            $data['development_end_date'] ?? null,
            $data['image_base64'] ?? null,
            $data['image_mime'] ?? null,
            $data['url_github'] ?? null,
            $data['url_site'] ?? null,
            $data['url_download'] ?? null,
            $data['description'] ?? null,
            $data['project_category_id'] ?? null
        );
    }
    public function toArray(): array
    {
        return array_filter([
            'type_project' => $this->type_project,
            'title_project' => $this->title_project,
            'development_start_date' => $this->development_start_date,
            'development_end_date' => $this->development_end_date,
            'image_base64' => $this->image_base64,
            'image_mime' => $this->image_mime,
            'url_github' => $this->url_github,
            'url_site' => $this->url_site,
            'url_download' => $this->url_download,
            'description' => $this->description,
            'project_category_id' => $this->project_category_id,
        ], fn($value) => !is_null($value));
    }
}



/* 
$dto = ProjectUpdateDto::fromRequest($request);

// Luego actualizas el proyecto
$project->update(
    array_filter($dto->toArray(), fn($value) => !is_null($value)) // Solo valores no nulos
);
 */
