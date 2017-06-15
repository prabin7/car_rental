<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramGallery extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'program_id',
    ];

    public $timestamps=true;

    protected $table='program_gallery';

    /**
     * Get the program that owns the photo.
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
