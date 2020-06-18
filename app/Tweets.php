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
        return $this->morphMany(Comments::class,'tweet')->whereNull('parent_id');
    }
}