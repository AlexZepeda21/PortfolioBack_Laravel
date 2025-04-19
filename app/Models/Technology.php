<?php

namespace App\Models;
//Importando modelos
use App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $table = "technologies";
    protected $primaryKey = "id_technology";

    protected $fillable = [
        "name_technologies",
        "description",
        "image_base64",
        "image_mime",
    ];

    public function projects(){
        return $this->belongsToMany(
            Project::class,
            "project_technology",
            "technology_id",
            "project_id",
            "id_technology",
            "id_project",
        );
    }

}
