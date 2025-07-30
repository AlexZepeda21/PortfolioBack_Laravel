<?php

namespace App\Dtos;

use Illuminate\Http\Request;

class ProjectTechnologyDto 
{
    public function __construct(
        public int $project_id,
        public int $technology_id
    ){}

     public static function fromRequest(Request $request): self
     {
        return new self(
        
            project_id: $request -> input('project_id'),
            technology_id: $request -> input('technology_id')

        );
     }
     public function toArray():array {
        return [
            'project_id' => $this->project_id,
            'technology_id' => $this->technology_id
        ];
     }
}
