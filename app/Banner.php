<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name', 'title', 'description', 'slug', 'status',
    ];

    public $timestamps=true;

    protected $table='banner';
}
