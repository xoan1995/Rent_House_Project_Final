<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['rating_id', 'content', 'parents_comment'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }
}
