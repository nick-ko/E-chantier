<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content', 'from_id', 'to_id'
    ];

    public function from(){
        return $this->belongsTo(Chief::class,'from_id');
    }
}
