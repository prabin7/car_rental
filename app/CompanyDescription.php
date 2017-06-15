<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDescription extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name', 'title', 'description',
    ];

    public $timestamps=true;

    protected $table='company_description';
}
