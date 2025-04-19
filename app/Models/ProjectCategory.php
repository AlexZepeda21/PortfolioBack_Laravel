<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = "project_categories";
    protected $primaryKey = "id_project_category";

    protected $fillable = [

        "title",
        "image_base64",
        "image_mime",
        "description",
        "summary",
        "url",
    ];

    public function projects(){
        return $this -> hasMany(Project::class, "project_category_id","id_project_category");
    }

}
