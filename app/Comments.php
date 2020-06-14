<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tweet(){
        return $this->belongsTo(Tweets::class, 'tweet_id');
    }

}