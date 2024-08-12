<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    public $table = 'projects';
    public $timestamp = false;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
