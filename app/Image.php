<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';

    protected $fillable = [
        'path', 'house_id'
    ];
    public $timestamps = false;

    public function houses()
    {
        return $this->belongsTo('App\House');
    }
}
