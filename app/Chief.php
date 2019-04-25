<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chief extends Model
{
    use Notifiable;
    //

    protected $fillable = [
        'chief_name', 'chief_email', 'chief_image','chief_password',
    ];
}
