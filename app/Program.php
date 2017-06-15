<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status'
    ];

    public $timestamps=true;

    protected $table='program';

    /**
     * Get the photos for the program.
     */
    public function photos()
    {
        return $this->hasMany('App\ProgramGallery');
    }

}
