<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(ProjectType::class,'mapping_project_project_type','project_id','project_type_id');
    }
}
