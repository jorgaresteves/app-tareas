<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    public function tasks()

    {

       return $this->hasMany(Task::class, 'project_id', 'id');

    }

    public function users(){
        
        return $this->belongsToMany(User::class);

        $user = User::find(1);

        foreach ($user->projects as $project){

            echo $project->pivot->created_at;
        }

    }
}
