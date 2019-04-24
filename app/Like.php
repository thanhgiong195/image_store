<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // fields can be filled
    protected $fillable = ['like', 'user_id', 'food_id'];
    
    public function food()
    {
        return $this->belongsTo('App\Food');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
