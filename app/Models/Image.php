<?php

namespace App\Models;

//Importando modelos.
use App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id_image';
    protected $fillable = [
        'title_image',
        'image_base64',
        'image_mime',
        'project_id'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id_project');
    }
}