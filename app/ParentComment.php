<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentComment extends Model
{
    protected $fillable = ['content','comment_id'];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
