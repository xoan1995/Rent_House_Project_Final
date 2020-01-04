<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
      'status','house_id','user_id','checkin','checkout','totalPrice'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function house(){
        return $this->belongsTo('App\House');
    }

}
