<?php

namespace App\Models;
use App\Models\ProjectCategory;
use App\Models\Image;
use App\Models\Technology;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $primaryKey = "id_project";
    protected $fillable = [
        'title_project',
        'type_project',
        'development_start_date',
        'development_end_date',
        'image_base64',
        'image_mime',
        'url_github',
        'url_site',
        'url_download',
        'description',
        'project_category_id',
        'user_id',
        'last_edition',

    ];

    
    public function user(){
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function projectCategory()
    {
        return $this->belongsTo(
            ProjectCategory::class,
            'project_category_id',
            'id_project_category'
        );
    }

    public function images()
    {
        return $this->hasMany(
            Image::class,
            'project_id',
            'id_project'
        ); /* Foreignkey en la tabla imágenes y primaryKey en la tabla Proyectos */
    }

    public function technologies()
    {
        return $this->belongsToMany
        (
            Technology::class,                 // Modelo relacionado
            'project_technology',                //Tabla pivote
            'project_id',             // FK en la tabla pivote que apunta a esta tabla (projects)
            'technology_id',          // FK en la tabla pivote que apunta a la otra tabla (technologies)
            'id_project',             // PK de esta tabla (projects)
            'id_technology'           // PK de la tabla relacionada (technologies)
        );
    }

    public function comments()
    {
        return $this->hasMany(
            Comment::class,
            'project_id',
            'id_project'
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $project->images()->delete();
            $project->comments()->delete();
        });

        static::updating(function ($project){
            $project->last_edition = now();
        });
    }

}
