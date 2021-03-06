<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'image'
    ];

    public function houses()
    {
        return $this->hasMany('App\House');
    }

    public function districts()
    {
        return $this->hasMany('App\District');
    }
}
