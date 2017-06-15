<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MVM extends Model
{
    //
    protected $fillable = [
        'mission', 'vision', 'message'
    ];

    public $timestamps=true;

    protected $table='mvm';
}
