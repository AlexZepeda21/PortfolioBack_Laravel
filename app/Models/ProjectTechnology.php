<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    protected $table = 'project_technology';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'technology_id',
    ];

    public $timestamps = true;

}

