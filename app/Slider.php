<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name', 'title', 'description', 'position', 'status',
    ];

    public $timestamps=true;

    protected $table='slider';
}
