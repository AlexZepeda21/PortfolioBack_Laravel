<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
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
        ];
    }
}
