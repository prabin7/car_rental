<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialSites extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'title', 'link', 'status',
    ];

    public $timestamps=true;

    protected $table='social_sites';
}
