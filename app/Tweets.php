<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comments::class,'tweet_id');
    }
}