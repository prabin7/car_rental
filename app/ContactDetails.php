<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'office_address', 'phone_no', 'mobile_no', 'email'
        ];

        public $timestamps=true;

        protected $table='contact_details';
}
