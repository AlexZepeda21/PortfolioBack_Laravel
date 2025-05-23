<?php
namespace App\Dtos;

use Illuminate\Http\Request;

class ProjectStoreDto
{
    public function __construct(
        public ?string $type_project,
        public string $title_project,
        public ?string $development_start_date,
        public ?string $development_end_date,
        public ?string $image_base64,
        public ?string $image_mime,
        public ?string $url_github,
        public ?string $url_site,
        public ?string $url_download,
        public ?string $description,
        public ?int $project_category_id = null,
        public int $user_id
    ) {
    }

    public static function fromRequest(Request $request): self
    {
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
            $request->input('project_category_id', null),
            $request->input('user_id'),
        );
    }

    public function toArray(): array
    {
        return [
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
            'user_id'=>$this->user_id,
        ];
    }
}
