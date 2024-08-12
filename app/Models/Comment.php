<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
Relation::morphMap([
    'project' => Project::class,
    'task' => Task::class
]);

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'commentable_id', 'commentable_type'];

    public function commentable(){
        return $this->morphTo();
    }
}
