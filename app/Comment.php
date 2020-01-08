<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'house_id', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function parentsComments()
    {
        return $this->hasMany('App\ParentComment');
    }
}
