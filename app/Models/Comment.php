<?php

namespace App\Models;

//Importando modelos
use App\Models\User;
use App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comments";
    protected $primaryKey="id_comment";
    protected $fillable=[
        "comment",
        "guest_name",
        "user_id",
        "project_id",

    ];
    
    public function user(){
        return $this->belongsTo(
            User::class,
            "user_id",
            "id"
        );
    }
    public function project(){
        return $this->belongsTo(
            Project::class,
            "project_id",
            "id_project"
        );
    }
}
