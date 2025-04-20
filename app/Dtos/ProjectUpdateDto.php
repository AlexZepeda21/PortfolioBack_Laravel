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
        public ?int $project_category_id,
    ) {}

    public static function fromRequest(Request $request): self
    { 
        $data = array_filter($request->all(), fn($value) => !is_null($value));

        return new self(
            $request->input('type_project'),
            $request->input('title_project'),
            $request->input('development_start_date'),
            $request->input('development_end_date'),
            $request->input('image_base64'),
            $request->input('image_mime'),
            $request->input('url_github'),
            $request->input('url_site'),
            $request->input('url_download'),
            $request->input('description'),
            $request->input('project_category_id')
        );
    }
}
/* 
$dto = ProjectUpdateDto::fromRequest($request);

// Luego actualizas el proyecto
$project->update(
    array_filter($dto->toArray(), fn($value) => !is_null($value)) // Solo valores no nulos
);
 */
